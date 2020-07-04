<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Failed_jobs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Failed_jobs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'failed_jobs/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'failed_jobs/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'failed_jobs/index.html';
            $config['first_url'] = base_url() . 'failed_jobs/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Failed_jobs_model->total_rows($q);
        $failed_jobs = $this->Failed_jobs_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'failed_jobs_data' => $failed_jobs,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('failed_jobs/failed_jobs_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Failed_jobs_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'connection' => $row->connection,
		'queue' => $row->queue,
		'payload' => $row->payload,
		'exception' => $row->exception,
		'failed_at' => $row->failed_at,
	    );
            $this->load->view('failed_jobs/failed_jobs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('failed_jobs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('failed_jobs/create_action'),
	    'id' => set_value('id'),
	    'connection' => set_value('connection'),
	    'queue' => set_value('queue'),
	    'payload' => set_value('payload'),
	    'exception' => set_value('exception'),
	    'failed_at' => set_value('failed_at'),
	);
        $this->load->view('failed_jobs/failed_jobs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'connection' => $this->input->post('connection',TRUE),
		'queue' => $this->input->post('queue',TRUE),
		'payload' => $this->input->post('payload',TRUE),
		'exception' => $this->input->post('exception',TRUE),
		'failed_at' => $this->input->post('failed_at',TRUE),
	    );

            $this->Failed_jobs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('failed_jobs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Failed_jobs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('failed_jobs/update_action'),
		'id' => set_value('id', $row->id),
		'connection' => set_value('connection', $row->connection),
		'queue' => set_value('queue', $row->queue),
		'payload' => set_value('payload', $row->payload),
		'exception' => set_value('exception', $row->exception),
		'failed_at' => set_value('failed_at', $row->failed_at),
	    );
            $this->load->view('failed_jobs/failed_jobs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('failed_jobs'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'connection' => $this->input->post('connection',TRUE),
		'queue' => $this->input->post('queue',TRUE),
		'payload' => $this->input->post('payload',TRUE),
		'exception' => $this->input->post('exception',TRUE),
		'failed_at' => $this->input->post('failed_at',TRUE),
	    );

            $this->Failed_jobs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('failed_jobs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Failed_jobs_model->get_by_id($id);

        if ($row) {
            $this->Failed_jobs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('failed_jobs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('failed_jobs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('connection', 'connection', 'trim|required');
	$this->form_validation->set_rules('queue', 'queue', 'trim|required');
	$this->form_validation->set_rules('payload', 'payload', 'trim|required');
	$this->form_validation->set_rules('exception', 'exception', 'trim|required');
	$this->form_validation->set_rules('failed_at', 'failed at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Failed_jobs.php */
/* Location: ./application/controllers/Failed_jobs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
