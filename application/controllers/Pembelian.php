<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian/index.html';
            $config['first_url'] = base_url() . 'pembelian/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_model->total_rows($q);
        $pembelian = $this->Pembelian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pembelian/pembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembelian' => $row->id_pembelian,
		'users_id' => $row->users_id,
		'bukti_pembayaran' => $row->bukti_pembayaran,
		'status_pembayaran' => $row->status_pembayaran,
	    );
            $this->load->view('pembelian/pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
	    'id_pembelian' => set_value('id_pembelian'),
	    'users_id' => set_value('users_id'),
	    'bukti_pembayaran' => set_value('bukti_pembayaran'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	);
        $this->load->view('pembelian/pembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'users_id' => $this->input->post('users_id',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
		'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),
		'users_id' => set_value('users_id', $row->users_id),
		'bukti_pembayaran' => set_value('bukti_pembayaran', $row->bukti_pembayaran),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
	    );
            $this->load->view('pembelian/pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembelian', TRUE));
        } else {
            $data = array(
		'users_id' => $this->input->post('users_id',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('users_id', 'users id', 'trim|required');
	$this->form_validation->set_rules('bukti_pembayaran', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');

	$this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
