<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paket/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paket/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paket/index.html';
            $config['first_url'] = base_url() . 'paket/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Paket_model->total_rows($q);
        $paket = $this->Paket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'paket_data' => $paket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('paket/paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_paket' => $row->nama_paket,
		'deskripsi' => $row->deskripsi,
		'harga' => $row->harga,
		'zoom' => $row->zoom,
		'max_user' => $row->max_user,
	    );
            $this->load->view('paket/paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket/create_action'),
	    'id' => set_value('id'),
	    'nama_paket' => set_value('nama_paket'),
	    'deskripsi' => set_value('deskripsi'),
	    'harga' => set_value('harga'),
	    'zoom' => set_value('zoom'),
	    'max_user' => set_value('max_user'),
	);
        $this->load->view('paket/paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(

		'id' => $this->input->post('id',TRUE),
		'nama_paket' => $this->input->post('nama_paket',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'zoom' => $this->input->post('zoom',TRUE),
		'max_user' => $this->input->post('max_user',TRUE),
	    );

            $this->Paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paket/update_action'),
		'id' => set_value('id', $row->id),
		'nama_paket' => set_value('nama_paket', $row->nama_paket),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'harga' => set_value('harga', $row->harga),
		'zoom' => set_value('zoom', $row->zoom),
		'max_user' => set_value('max_user', $row->max_user),
	    );
            $this->load->view('paket/paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_paket' => $this->input->post('nama_paket',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'zoom' => $this->input->post('zoom',TRUE),
		'max_user' => $this->input->post('max_user',TRUE),
	    );

            $this->Paket_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $this->Paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_paket', 'nama paket', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('zoom', 'zoom', 'trim|required');
	$this->form_validation->set_rules('max_user', 'max user', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Paket.php */
/* Location: ./application/controllers/Paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
