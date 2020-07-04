<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migrations extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Migrations_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'migrations/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'migrations/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'migrations/index.html';
            $config['first_url'] = base_url() . 'migrations/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Migrations_model->total_rows($q);
        $migrations = $this->Migrations_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'migrations_data' => $migrations,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('migrations/migrations_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'migration' => $row->migration,
		'batch' => $row->batch,
	    );
            $this->load->view('migrations/migrations_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('migrations/create_action'),
	    'id' => set_value('id'),
	    'migration' => set_value('migration'),
	    'batch' => set_value('batch'),
	);
        $this->load->view('migrations/migrations_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'migration' => $this->input->post('migration',TRUE),
		'batch' => $this->input->post('batch',TRUE),
	    );

            $this->Migrations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('migrations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('migrations/update_action'),
		'id' => set_value('id', $row->id),
		'migration' => set_value('migration', $row->migration),
		'batch' => set_value('batch', $row->batch),
	    );
            $this->load->view('migrations/migrations_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'migration' => $this->input->post('migration',TRUE),
		'batch' => $this->input->post('batch',TRUE),
	    );

            $this->Migrations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('migrations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Migrations_model->get_by_id($id);

        if ($row) {
            $this->Migrations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('migrations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('migrations'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('migration', 'migration', 'trim|required');
	$this->form_validation->set_rules('batch', 'batch', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Migrations.php */
/* Location: ./application/controllers/Migrations.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */