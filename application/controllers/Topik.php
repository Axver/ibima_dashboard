<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Topik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Topik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'topik/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'topik/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'topik/index.html';
            $config['first_url'] = base_url() . 'topik/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Topik_model->total_rows($q);
        $topik = $this->Topik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'topik_data' => $topik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('topik/topik_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Topik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_topik' => $row->nama_topik,
		'deskripsi_topik' => $row->deskripsi_topik,
		'thumbnail' => $row->thumbnail,
		'harga' => $row->harga,
		'zoom' => $row->zoom,
	    );
            $this->load->view('topik/topik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('topik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('topik/create_action'),
	    'id' => set_value('id'),
	    'nama_topik' => set_value('nama_topik'),
	    'deskripsi_topik' => set_value('deskripsi_topik'),
	    'thumbnail' => set_value('thumbnail'),
	    'harga' => set_value('harga'),
	    'zoom' => set_value('zoom'),
	);
        $this->load->view('topik/topik_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'nama_topik' => $this->input->post('nama_topik',TRUE),
		'deskripsi_topik' => $this->input->post('deskripsi_topik',TRUE),
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'zoom' => $this->input->post('zoom',TRUE),
	    );

            $this->Topik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('topik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Topik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('topik/update_action'),
		'id' => set_value('id', $row->id),
		'nama_topik' => set_value('nama_topik', $row->nama_topik),
		'deskripsi_topik' => set_value('deskripsi_topik', $row->deskripsi_topik),
		'thumbnail' => set_value('thumbnail', $row->thumbnail),
		'harga' => set_value('harga', $row->harga),
		'zoom' => set_value('zoom', $row->zoom),
	    );
            $this->load->view('topik/topik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('topik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_topik' => $this->input->post('nama_topik',TRUE),
		'deskripsi_topik' => $this->input->post('deskripsi_topik',TRUE),
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'zoom' => $this->input->post('zoom',TRUE),
	    );

            $this->Topik_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('topik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Topik_model->get_by_id($id);

        if ($row) {
            $this->Topik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('topik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('topik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_topik', 'nama topik', 'trim|required');
	$this->form_validation->set_rules('deskripsi_topik', 'deskripsi topik', 'trim|required');
	$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('zoom', 'zoom', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Topik.php */
/* Location: ./application/controllers/Topik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
