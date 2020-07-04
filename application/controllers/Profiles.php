<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profiles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profiles_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profiles/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profiles/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profiles/index.html';
            $config['first_url'] = base_url() . 'profiles/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profiles_model->total_rows($q);
        $profiles = $this->Profiles_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profiles_data' => $profiles,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('profiles/profiles_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'photo' => $row->photo,
		'company' => $row->company,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('profiles/profiles_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profiles/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'photo' => set_value('photo'),
	    'company' => set_value('company'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('profiles/profiles_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'company' => $this->input->post('company',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Profiles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profiles'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profiles/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'photo' => set_value('photo', $row->photo),
		'company' => set_value('company', $row->company),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('profiles/profiles_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'company' => $this->input->post('company',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Profiles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profiles'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);

        if ($row) {
            $this->Profiles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profiles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('company', 'company', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profiles.php */
/* Location: ./application/controllers/Profiles.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
