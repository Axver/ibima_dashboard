<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian_produk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian_produk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian_produk/index.html';
            $config['first_url'] = base_url() . 'pembelian_produk/index.html';
        }

        $config['per_page'] = 10000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_produk_model->total_rows($q);
        $pembelian_produk = $this->Pembelian_produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_produk_data' => $pembelian_produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pembelian_produk/pembelian_produk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_produk_model->get_by_id($id);
        if ($row) {
            $data = array(
				'nama_topik' => $row->nama_topik,
				'name' => $row->name,
				'email' => $row->email,
				'deskripsi' => $row->deskripsi_topik,
				'thumbnail' => $row->thumbnail,
				'harga' => $row->harga,
				'zoom' => $row->zoom,
		'id_pembelian' => $row->id_pembelian,
		'id_produk' => $row->id_produk,
		'created_at' => $row->created_at,
		'pembelian_id_pembelian' => $row->pembelian_id_pembelian,
		'bukti_pembayaran' => $row->bukti_pembayaran,
		'bukti_pembayaran1' => $row->bukti_pembayaran1,
		'status_pembayaran' => $row->status_pembayaran,
		'status_pembayaran1' => $row->status_pembayaran1,
	    );
            $this->load->view('pembelian_produk/pembelian_produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian_produk/create_action'),
	    'id_pembelian' => set_value('id_pembelian'),
	    'id_produk' => set_value('id_produk'),
	    'created_at' => set_value('created_at'),
	    'pembelian_id_pembelian' => set_value('pembelian_id_pembelian'),
	    'bukti_pembayaran' => set_value('bukti_pembayaran'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	);
        $this->load->view('pembelian_produk/pembelian_produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'pembelian_id_pembelian' => $this->input->post('pembelian_id_pembelian',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian_produk'));
        }
    }
    
    public function update($id) 
    {

//    	echo $id;


        $row = $this->Pembelian_produk_model->get_by_idd($id);
//        var_dump($row);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian_produk/update_action'),
		'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'created_at' => set_value('created_at', $row->created_at),
		'pembelian_id_pembelian' => set_value('pembelian_id_pembelian', $row->pembelian_id_pembelian),
		'bukti_pembayaran' => set_value('bukti_pembayaran', $row->bukti_pembayaran),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
	    );
            $this->load->view('pembelian_produk/pembelian_produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

            $data = array(

		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Pembelian_produk_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian_produk'));

    }
    
    public function delete($id) 
    {
        $row = $this->Pembelian_produk_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian_produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian_produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('pembelian_id_pembelian', 'pembelian id pembelian', 'trim|required');
	$this->form_validation->set_rules('bukti_pembayaran', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');

	$this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembelian_produk.php */
/* Location: ./application/controllers/Pembelian_produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 05:00:10 */
/* http://harviacode.com */
