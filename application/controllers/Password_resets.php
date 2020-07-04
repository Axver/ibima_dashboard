<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Password_resets extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Password_resets_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'password_resets/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'password_resets/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'password_resets/index.html';
            $config['first_url'] = base_url() . 'password_resets/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Password_resets_model->total_rows($q);
        $password_resets = $this->Password_resets_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'password_resets_data' => $password_resets,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('password_resets/password_resets_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);
        if ($row) {
            $data = array(
		'email' => $row->email,
		'token' => $row->token,
		'created_at' => $row->created_at,
	    );
            $this->load->view('password_resets/password_resets_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('password_resets/create_action'),
	    'email' => set_value('email'),
	    'token' => set_value('token'),
	    'created_at' => set_value('created_at'),
	);
        $this->load->view('password_resets/password_resets_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'token' => $this->input->post('token',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Password_resets_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('password_resets'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('password_resets/update_action'),
		'email' => set_value('email', $row->email),
		'token' => set_value('token', $row->token),
		'created_at' => set_value('created_at', $row->created_at),
	    );
            $this->load->view('password_resets/password_resets_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'token' => $this->input->post('token',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Password_resets_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('password_resets'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);

        if ($row) {
            $this->Password_resets_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('password_resets'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Password_resets.php */
/* Location: ./application/controllers/Password_resets.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
