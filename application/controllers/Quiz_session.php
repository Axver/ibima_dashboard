<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz_session extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Quiz_session_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'quiz_session/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'quiz_session/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'quiz_session/index.html';
            $config['first_url'] = base_url() . 'quiz_session/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Quiz_session_model->total_rows($q);
        $quiz_session = $this->Quiz_session_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'quiz_session_data' => $quiz_session,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('quiz_session/quiz_session_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Quiz_session_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_session' => $row->id_session,
		'name' => $row->name,
		'soal' => $row->soal,
		'starting_time' => $row->starting_time,
		'wrong_count' => $row->wrong_count,
		'correct_count' => $row->correct_count,
		'score' => $row->score,
		'id' => $row->id,
		'quiz_id' => $row->quiz_id,
		'certificate' => $row->certificate,
	    );
            $this->load->view('quiz_session/quiz_session_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz_session'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('quiz_session/create_action'),
	    'id_session' => set_value('id_session'),
	    'starting_time' => set_value('starting_time'),
	    'wrong_count' => set_value('wrong_count'),
	    'correct_count' => set_value('correct_count'),
	    'score' => set_value('score'),
	    'id' => set_value('id'),
	    'quiz_id' => set_value('quiz_id'),
	    'certificate' => set_value('certificate'),
	);
        $this->load->view('quiz_session/quiz_session_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'starting_time' => $this->input->post('starting_time',TRUE),
		'wrong_count' => $this->input->post('wrong_count',TRUE),
		'correct_count' => $this->input->post('correct_count',TRUE),
		'score' => $this->input->post('score',TRUE),
		'id' => $this->input->post('id',TRUE),
		'quiz_id' => $this->input->post('quiz_id',TRUE),
		'certificate' => $this->input->post('certificate',TRUE),
	    );

            $this->Quiz_session_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('quiz_session'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Quiz_session_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('quiz_session/update_action'),
		'id_session' => set_value('id_session', $row->id_session),
		'starting_time' => set_value('starting_time', $row->starting_time),
		'wrong_count' => set_value('wrong_count', $row->wrong_count),
		'correct_count' => set_value('correct_count', $row->correct_count),
		'score' => set_value('score', $row->score),
		'id' => set_value('id', $row->id),
		'quiz_id' => set_value('quiz_id', $row->quiz_id),
		'certificate' => set_value('certificate', $row->certificate),
	    );
            $this->load->view('quiz_session/quiz_session_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz_session'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_session', TRUE));
        } else {
            $data = array(
		'starting_time' => $this->input->post('starting_time',TRUE),
		'wrong_count' => $this->input->post('wrong_count',TRUE),
		'correct_count' => $this->input->post('correct_count',TRUE),
		'score' => $this->input->post('score',TRUE),
		'id' => $this->input->post('id',TRUE),
		'quiz_id' => $this->input->post('quiz_id',TRUE),
		'certificate' => $this->input->post('certificate',TRUE),
	    );

            $this->Quiz_session_model->update($this->input->post('id_session', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('quiz_session'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Quiz_session_model->get_by_id($id);

        if ($row) {
            $this->Quiz_session_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('quiz_session'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quiz_session'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('starting_time', 'starting time', 'trim|required');
	$this->form_validation->set_rules('wrong_count', 'wrong count', 'trim|required');
	$this->form_validation->set_rules('correct_count', 'correct count', 'trim|required');
	$this->form_validation->set_rules('score', 'score', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('quiz_id', 'quiz id', 'trim|required');
	$this->form_validation->set_rules('certificate', 'certificate', 'trim|required');

	$this->form_validation->set_rules('id_session', 'id_session', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Quiz_session.php */
/* Location: ./application/controllers/Quiz_session.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */
