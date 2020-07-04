<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket_max extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_max_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paket_max/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paket_max/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paket_max/index.html';
            $config['first_url'] = base_url() . 'paket_max/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Paket_max_model->total_rows($q);
        $paket_max = $this->Paket_max_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'paket_max_data' => $paket_max,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('paket_max/paket_max_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_max_model->get_by_id($id);
        if ($row) {
            $data = array(
		'paket_id' => $row->paket_id,
		'max' => $row->max,
		'harga' => $row->harga,
	    );
            $this->load->view('paket_max/paket_max_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_max'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket_max/create_action'),
	    'paket_id' => set_value('paket_id'),
	    'max' => set_value('max'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('paket_max/paket_max_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'paket_id' => $this->input->post('paket_id',TRUE),
		'max' => $this->input->post('max',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Paket_max_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket_max'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paket_max_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paket_max/update_action'),
		'paket_id' => set_value('paket_id', $row->paket_id),
		'max' => set_value('max', $row->max),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('paket_max/paket_max_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_max'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'paket_id' => $this->input->post('paket_id',TRUE),
		'max' => $this->input->post('max',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Paket_max_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paket_max'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_max_model->get_by_id($id);

        if ($row) {
            $this->Paket_max_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket_max'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_max'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('paket_id', 'paket id', 'trim|required');
	$this->form_validation->set_rules('max', 'max', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Paket_max.php */
/* Location: ./application/controllers/Paket_max.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
