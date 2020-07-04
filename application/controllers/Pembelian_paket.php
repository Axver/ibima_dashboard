<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian_paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian_paket/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian_paket/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian_paket/index.html';
            $config['first_url'] = base_url() . 'pembelian_paket/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_paket_model->total_rows($q);
        $pembelian_paket = $this->Pembelian_paket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_paket_data' => $pembelian_paket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pembelian_paket/pembelian_paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_paket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembelian' => $row->id_pembelian,
		'id' => $row->id,
		'list_email' => $row->list_email,
		'pembelian_id_pembelian' => $row->pembelian_id_pembelian,
		'created_at' => $row->created_at,
		'bukti_pembayaran' => $row->bukti_pembayaran,
		'status_pembayaran' => $row->status_pembayaran,
	    );
            $this->load->view('pembelian_paket/pembelian_paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian_paket/create_action'),
	    'id_pembelian' => set_value('id_pembelian'),
	    'id' => set_value('id'),
	    'list_email' => set_value('list_email'),
	    'pembelian_id_pembelian' => set_value('pembelian_id_pembelian'),
	    'created_at' => set_value('created_at'),
	    'bukti_pembayaran' => set_value('bukti_pembayaran'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	);
        $this->load->view('pembelian_paket/pembelian_paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'list_email' => $this->input->post('list_email',TRUE),
		'pembelian_id_pembelian' => $this->input->post('pembelian_id_pembelian',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian_paket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembelian_paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian_paket/update_action'),
		'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),
		'id' => set_value('id', $row->id),
		'list_email' => set_value('list_email', $row->list_email),
		'pembelian_id_pembelian' => set_value('pembelian_id_pembelian', $row->pembelian_id_pembelian),
		'created_at' => set_value('created_at', $row->created_at),
		'bukti_pembayaran' => set_value('bukti_pembayaran', $row->bukti_pembayaran),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
	    );
            $this->load->view('pembelian_paket/pembelian_paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_paket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembelian', TRUE));
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'list_email' => $this->input->post('list_email',TRUE),
		'pembelian_id_pembelian' => $this->input->post('pembelian_id_pembelian',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_paket_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian_paket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembelian_paket_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian_paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('list_email', 'list email', 'trim|required');
	$this->form_validation->set_rules('pembelian_id_pembelian', 'pembelian id pembelian', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('bukti_pembayaran', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');

	$this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian_paket.php */
/* Location: ./application/controllers/Pembelian_paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */