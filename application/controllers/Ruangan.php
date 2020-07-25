<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');
    }

    public function save()
	{
		$pembeli=$_POST['pembeli'];
		$ruangan=$_POST['ruangan'];


//		Update Data

		$data=$this->db->query("UPDATE pembelian_produk SET idruangan=$ruangan WHERE id_pembelian='$pembeli'");

		if($data)
		{
			echo "Berhasil Ditambahkan";
		}
		else
		{
			echo "Transaksi Gagal";
		}
	}


	public function save1()
	{
		$pembeli=$_POST['pembeli'];
		$ruangan=$_POST['ruangan'];


//		Update Data

		$data=$this->db->query("UPDATE pembelian_paket SET idruangan=$ruangan WHERE id_pembelian='$pembeli'");

		if($data)
		{
			echo "Berhasil Ditambahkan";
		}
		else
		{
			echo "Transaksi Gagal";
		}
	}

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ruangan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ruangan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ruangan/index.html';
            $config['first_url'] = base_url() . 'ruangan/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ruangan_model->total_rows($q);
        $ruangan = $this->Ruangan_model->get_limit_data($config['per_page'], $start, $q);
        $ruangan1 = $this->Ruangan_model->get_limit_data1();
        $ruangan2 = $this->Ruangan_model->get_limit_data2();
        $ruangan3 = $this->Ruangan_model->get_limit_data3();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ruangan_data' => $ruangan,
            'ruangan_data1' => $ruangan1,
            'ruangan_data2' => $ruangan2,
            'ruangan_data3' => $ruangan3,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ruangan/ruangan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idruangan' => $row->idruangan,
		'nama_topik' => $row->nama_topik,
		'nama_ruangan' => $row->nama_ruangan,
		'link_zoom' => $row->link_zoom,
		'informasi' => $row->informasi,
		'topik_id' => $row->topik_id,
	    );
            $this->load->view('ruangan/ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ruangan/create_action'),
	    'idruangan' => set_value('idruangan'),
	    'nama_ruangan' => set_value('nama_ruangan'),
	    'link_zoom' => set_value('link_zoom'),
	    'informasi' => set_value('informasi'),
	    'topik_id' => set_value('topik_id'),
	);
        $this->load->view('ruangan/ruangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'link_zoom' => $this->input->post('link_zoom',TRUE),
		'informasi' => $this->input->post('informasi',TRUE),
		'topik_id' => $this->input->post('topik_id',TRUE),
	    );

            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ruangan/update_action'),
		'idruangan' => set_value('idruangan', $row->idruangan),
		'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
		'link_zoom' => set_value('link_zoom', $row->link_zoom),
		'informasi' => set_value('informasi', $row->informasi),
		'topik_id' => set_value('topik_id', $row->topik_id),
	    );
            $this->load->view('ruangan/ruangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idruangan', TRUE));
        } else {
            $data = array(
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'link_zoom' => $this->input->post('link_zoom',TRUE),
		'informasi' => $this->input->post('informasi',TRUE),
		'topik_id' => $this->input->post('topik_id',TRUE),
	    );

            $this->Ruangan_model->update($this->input->post('idruangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $this->Ruangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ruangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
	$this->form_validation->set_rules('link_zoom', 'link zoom', 'trim|required');
	$this->form_validation->set_rules('informasi', 'informasi', 'trim|required');
	$this->form_validation->set_rules('topik_id', 'topik id', 'trim|required');

	$this->form_validation->set_rules('idruangan', 'idruangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/Ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-11 05:46:13 */
/* http://harviacode.com */
