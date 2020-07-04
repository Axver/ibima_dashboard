<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Modul_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'modul/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'modul/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'modul/index.html';
            $config['first_url'] = base_url() . 'modul/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Modul_model->total_rows($q);
        $modul = $this->Modul_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'modul_data' => $modul,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('modul/modul_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Modul_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_modul' => $row->id_modul,
		'id_produk' => $row->id_produk,
		'nama_modul' => $row->nama_modul,
		'file_modul' => $row->file_modul,
	    );
            $this->load->view('modul/modul_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('modul/create_action'),
	    'id_modul' => set_value('id_modul'),
	    'id_produk' => set_value('id_produk'),
	    'nama_modul' => set_value('nama_modul'),
	    'file_modul' => set_value('file_modul'),
	);
        $this->load->view('modul/modul_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'nama_modul' => $this->input->post('nama_modul',TRUE),
		'file_modul' => $this->input->post('file_modul',TRUE),
	    );

            $this->Modul_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('modul'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Modul_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('modul/update_action'),
		'id_modul' => set_value('id_modul', $row->id_modul),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'nama_modul' => set_value('nama_modul', $row->nama_modul),
		'file_modul' => set_value('file_modul', $row->file_modul),
	    );
            $this->load->view('modul/modul_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_modul', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'nama_modul' => $this->input->post('nama_modul',TRUE),
		'file_modul' => $this->input->post('file_modul',TRUE),
	    );

            $this->Modul_model->update($this->input->post('id_modul', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('modul'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Modul_model->get_by_id($id);

        if ($row) {
            $this->Modul_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('modul'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('nama_modul', 'nama modul', 'trim|required');
	$this->form_validation->set_rules('file_modul', 'file modul', 'trim|required');

	$this->form_validation->set_rules('id_modul', 'id_modul', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Modul.php */
/* Location: ./application/controllers/Modul.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */