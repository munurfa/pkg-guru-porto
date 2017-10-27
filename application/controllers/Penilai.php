<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        //dua akses
        // $this->simple_login->cek_login('admin','kepsek'); 
        //bila terdapat 1 akses saja
        // $this->simple_login->cek_login('guru');
        $this->simple_login->cek_login($this->session->status);//semua akses
        $this->load->model('Penilai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pegawai = $this->Penilai_model->get_all();

        $data = array(
            'pegawai_data' => $pegawai
        );

        $this->template->load('template','penilai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Penilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penilai' 		=> $row->id_penilai,
		'nip_penilai' 		=> $row->nip_penilai,
		'nama' 		=> $row->nama,
		'pangkat' 		=> $row->pangkat,
		'golongan' 		=> $row->golongan,
		
		'status' => $row->status,
		'keterangan' => $row->keterangan,
		
	    );
            $this->template->load('template','penilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilai'));
        }
    }

    public function create() 
    {	


        $data = array(
            'button' => 'Create',
            'action' => site_url('penilai/create_action'),

        'id_penilai' => set_value('id_penilai'),
	    'nip_penilai' => set_value('nip_penilai'),
	    'nama' => set_value('nama'),
	    'pangkat' => set_value('pangkat'),
	    'golongan' => set_value('golongan'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
	    
	    
	);
        $this->template->load('template','penilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	
            $data = array(
		'nip_penilai' => $this->input->post('nip_penilai',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'pangkat' => $this->input->post('pangkat',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'id_penilai' => $this->input->post('id_penilai',TRUE),
		
	    );

            $this->Penilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penilai/update_action'),
                'id_penilai' => set_value('nip_penilai',$row->id_penilai),
                'nip_penilai' => set_value('nip_penilai',$row->nip_penilai),
			    'nama' => set_value('nama',$row->nama),
			    'pangkat' => set_value('pangkat',$row->pangkat),
			    'golongan' => set_value('golongan',$row->golongan),
			    'status' => set_value('nuptk',$row->status),
			    'keterangan' => set_value('keterangan',$row->keterangan),
		
	    );
            $this->template->load('template','penilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pegawai', TRUE));
        } else {
            $data = array(
            	'nip_penilai' => $this->input->post('nip_penilai',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'pangkat' => $this->input->post('pangkat',TRUE),
				'golongan' => $this->input->post('golongan',TRUE),
				'status' => $this->input->post('status',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
		
	    );

            $this->Penilai_model->update($this->input->post('id_penilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penilai_model->get_by_id($id);

        if ($row) {
            $this->Penilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip_penilai', 'nip penilai', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
	$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim');
	

	$this->form_validation->set_rules('id_penilai', 'id_penilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

   

}

