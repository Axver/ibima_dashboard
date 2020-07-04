<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_triaining extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Image_triaining_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'image_triaining/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'image_triaining/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'image_triaining/index.html';
            $config['first_url'] = base_url() . 'image_triaining/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Image_triaining_model->total_rows($q);
        $image_triaining = $this->Image_triaining_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'image_triaining_data' => $image_triaining,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('image_triaining/image_triaining_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Image_triaining_model->get_by_id($id);
        if ($row) {
            $data = array(
		'image' => $row->image,
		'id' => $row->id,
	    );
            $this->load->view('image_triaining/image_triaining_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image_triaining'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('image_triaining/create_action'),
	    'image' => set_value('image'),
	    'id' => set_value('id'),
	);
        $this->load->view('image_triaining/image_triaining_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Image_triaining_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('image_triaining'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Image_triaining_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('image_triaining/update_action'),
		'image' => set_value('image', $row->image),
		'id' => set_value('id', $row->id),
	    );
            $this->load->view('image_triaining/image_triaining_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image_triaining'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('image', TRUE));
        } else {
            $data = array(
	    );

            $this->Image_triaining_model->update($this->input->post('image', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('image_triaining'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Image_triaining_model->get_by_id($id);

        if ($row) {
            $this->Image_triaining_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('image_triaining'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image_triaining'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('image', 'image', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Image_triaining.php */
/* Location: ./application/controllers/Image_triaining.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-04 02:28:51 */
/* http://harviacode.com */