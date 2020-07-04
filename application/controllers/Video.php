<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'video/index.html';
            $config['first_url'] = base_url() . 'video/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Video_model->total_rows($q);
        $video = $this->Video_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'video_data' => $video,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('video/video_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Video_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_video' => $row->id_video,
		'id_modul' => $row->id_modul,
		'nama_video' => $row->nama_video,
		'url' => $row->url,
	    );
            $this->load->view('video/video_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('video/create_action'),
	    'id_video' => set_value('id_video'),
	    'id_modul' => set_value('id_modul'),
	    'nama_video' => set_value('nama_video'),
	    'url' => set_value('url'),
	);
        $this->load->view('video/video_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_modul' => $this->input->post('id_modul',TRUE),
		'nama_video' => $this->input->post('nama_video',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->Video_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('video'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('video/update_action'),
		'id_video' => set_value('id_video', $row->id_video),
		'id_modul' => set_value('id_modul', $row->id_modul),
		'nama_video' => set_value('nama_video', $row->nama_video),
		'url' => set_value('url', $row->url),
	    );
            $this->load->view('video/video_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_video', TRUE));
        } else {
            $data = array(
		'id_modul' => $this->input->post('id_modul',TRUE),
		'nama_video' => $this->input->post('nama_video',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->Video_model->update($this->input->post('id_video', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('video'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $this->Video_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('video'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_modul', 'id modul', 'trim|required');
	$this->form_validation->set_rules('nama_video', 'nama video', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');

	$this->form_validation->set_rules('id_video', 'id_video', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Video.php */
/* Location: ./application/controllers/Video.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
