<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_topik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_topik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_topik/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_topik/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_topik/index.html';
            $config['first_url'] = base_url() . 'user_topik/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_topik_model->total_rows($q);
        $user_topik = $this->User_topik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_topik_data' => $user_topik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user_topik/user_topik_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_topik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jumlah_percobaan' => $row->jumlah_percobaan,
		'users_id' => $row->users_id,
		'topik_id' => $row->topik_id,
	    );
            $this->load->view('user_topik/user_topik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_topik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_topik/create_action'),
	    'id' => set_value('id'),
	    'jumlah_percobaan' => set_value('jumlah_percobaan'),
	    'users_id' => set_value('users_id'),
	    'topik_id' => set_value('topik_id'),
	);
        $this->load->view('user_topik/user_topik_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jumlah_percobaan' => $this->input->post('jumlah_percobaan',TRUE),
		'users_id' => $this->input->post('users_id',TRUE),
		'topik_id' => $this->input->post('topik_id',TRUE),
	    );

            $this->User_topik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_topik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_topik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_topik/update_action'),
		'id' => set_value('id', $row->id),
		'jumlah_percobaan' => set_value('jumlah_percobaan', $row->jumlah_percobaan),
		'users_id' => set_value('users_id', $row->users_id),
		'topik_id' => set_value('topik_id', $row->topik_id),
	    );
            $this->load->view('user_topik/user_topik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_topik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jumlah_percobaan' => $this->input->post('jumlah_percobaan',TRUE),
		'users_id' => $this->input->post('users_id',TRUE),
		'topik_id' => $this->input->post('topik_id',TRUE),
	    );

            $this->User_topik_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_topik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_topik_model->get_by_id($id);

        if ($row) {
            $this->User_topik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_topik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_topik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jumlah_percobaan', 'jumlah percobaan', 'trim|required');
	$this->form_validation->set_rules('users_id', 'users id', 'trim|required');
	$this->form_validation->set_rules('topik_id', 'topik id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User_topik.php */
/* Location: ./application/controllers/User_topik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */