<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_modul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_modul_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_modul/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_modul/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_modul/index.html';
            $config['first_url'] = base_url() . 'user_modul/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_modul_model->total_rows($q);
        $user_modul = $this->User_modul_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_modul_data' => $user_modul,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user_modul/user_modul_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_modul_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_modul' => $row->id_modul,
		'status_penyelesaian' => $row->status_penyelesaian,
	    );
            $this->load->view('user_modul/user_modul_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_modul'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_modul/create_action'),
	    'id' => set_value('id'),
	    'id_modul' => set_value('id_modul'),
	    'status_penyelesaian' => set_value('status_penyelesaian'),
	);
        $this->load->view('user_modul/user_modul_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'status_penyelesaian' => $this->input->post('status_penyelesaian',TRUE),
	    );

            $this->User_modul_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_modul'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_modul_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_modul/update_action'),
		'id' => set_value('id', $row->id),
		'id_modul' => set_value('id_modul', $row->id_modul),
		'status_penyelesaian' => set_value('status_penyelesaian', $row->status_penyelesaian),
	    );
            $this->load->view('user_modul/user_modul_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_modul'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'status_penyelesaian' => $this->input->post('status_penyelesaian',TRUE),
	    );

            $this->User_modul_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_modul'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_modul_model->get_by_id($id);

        if ($row) {
            $this->User_modul_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_modul'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_modul'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('status_penyelesaian', 'status penyelesaian', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User_modul.php */
/* Location: ./application/controllers/User_modul.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */