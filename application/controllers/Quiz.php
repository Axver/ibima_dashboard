<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'quiz/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'quiz/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'quiz/index.html';
            $config['first_url'] = base_url() . 'quiz/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Quiz_model->total_rows($q);
        $quiz = $this->Quiz_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'quiz_data' => $quiz,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('quiz/quiz_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Quiz_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'soal' => $row->soal,
		'expiration' => $row->expiration,
		'total_question' => $row->total_question,
	    );
            $this->load->view('quiz/quiz_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('quiz/create_action'),
	    'id' => set_value('id'),
	    'soal' => set_value('soal'),
	    'expiration' => set_value('expiration'),
	    'total_question' => set_value('total_question'),
	);
        $this->load->view('quiz/quiz_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'soal' => $this->input->post('soal',TRUE),
		'expiration' => $this->input->post('expiration',TRUE),
		'total_question' => $this->input->post('total_question',TRUE),
	    );

            $this->Quiz_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('quiz'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Quiz_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('quiz/update_action'),
		'id' => set_value('id', $row->id),
		'soal' => set_value('soal', $row->soal),
		'expiration' => set_value('expiration', $row->expiration),
		'total_question' => set_value('total_question', $row->total_question),
	    );
            $this->load->view('quiz/quiz_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'soal' => $this->input->post('soal',TRUE),
		'expiration' => $this->input->post('expiration',TRUE),
		'total_question' => $this->input->post('total_question',TRUE),
	    );

            $this->Quiz_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('quiz'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Quiz_model->get_by_id($id);

        if ($row) {
            $this->Quiz_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('quiz'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('soal', 'soal', 'trim|required');
	$this->form_validation->set_rules('expiration', 'expiration', 'trim|required');
	$this->form_validation->set_rules('total_question', 'total question', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Quiz.php */
/* Location: ./application/controllers/Quiz.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
