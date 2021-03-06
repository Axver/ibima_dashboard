<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Question_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'question/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'question/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'question/index.html';
            $config['first_url'] = base_url() . 'question/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Question_model->total_rows($q);
        $question = $this->Question_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'question_data' => $question,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('question/question_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Question_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'quiz_id' => $row->quiz_id,
		'question' => $row->question,
		'option' => $row->option,
		'answer' => $row->answer,
	    );
            $this->load->view('question/question_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('question/create_action'),
	    'id' => set_value('id'),
	    'quiz_id' => set_value('quiz_id'),
	    'question' => set_value('question'),
	    'option' => set_value('option'),
	    'answer' => set_value('answer'),
	);
        $this->load->view('question/question_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(

		'id' => $this->input->post('id',TRUE),
		'quiz_id' => $this->input->post('quiz_id',TRUE),
		'question' => $this->input->post('question',TRUE),
		'option' => $this->input->post('option',TRUE),
		'answer' => $this->input->post('answer',TRUE),
	    );

            $this->Question_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('question'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('question/update_action'),
		'id' => set_value('id', $row->id),
		'quiz_id' => set_value('quiz_id', $row->quiz_id),
		'question' => set_value('question', $row->question),
		'option' => set_value('option', $row->option),
		'answer' => set_value('answer', $row->answer),
	    );
            $this->load->view('question/question_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'quiz_id' => $this->input->post('quiz_id',TRUE),
		'question' => $this->input->post('question',TRUE),
		'option' => $this->input->post('option',TRUE),
		'answer' => $this->input->post('answer',TRUE),
	    );

            $this->Question_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('question'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $this->Question_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('question'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('quiz_id', 'quiz id', 'trim|required');
	$this->form_validation->set_rules('question', 'question', 'trim|required');
	$this->form_validation->set_rules('option', 'option', 'trim|required');
	$this->form_validation->set_rules('answer', 'answer', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Question.php */
/* Location: ./application/controllers/Question.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
