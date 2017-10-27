<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login($this->session->status);
        $this->load->model('Kepsek_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pegawai = $this->Kepsek_model->get_all();

        $data = array(
            'pegawai_data' => $pegawai
        );

        $this->template->load('template','kepsek_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kepsek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pegawai' 		=> $row->id_pegawai,
		'nip_pegawai' 		=> $row->nip_pegawai,
		'nama_pegawai' 		=> $row->nama_pegawai,
		'nuptk' => $row->nuptk,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jabatan_fungsional' => $row->jabatan_fungsional,
		'tamat_sbguru' => $row->tamat_sbguru,
		'tgl_awalkerja' => $row->tgl_awalkerja,
		'pendidikan_terakhir' => $row->pendidikan_terakhir,
		'program_keahlian' => $row->program_keahlian,
		'golongan' => $row->golongan,
		'status' => $row->status,
		'jenis_kelamin' => $row->jenis_kelamin,
		'spesialisasi' => $row->spesialisasi,
		'pangkat' => $row->pangkat,
		'masa_kerja' => $row->masa_kerja,
		'jam_ajar' => $row->jam_ajar,
	    );
            $this->template->load('template','kepsek_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsek'));
        }
    }

    public function create() 
    {	


        $data = array(
            'button' => 'Create',
            'action' => site_url('kepsek/create_action'),

        'id_pegawai' => set_value('id_pegawai'),
	    'nip_pegawai' => set_value('nip_pegawai'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	    'nuptk' => set_value('nuptk'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    // 'jabatan_fungsional' => set_value('jabatan_fungsional'),
	    'tamat_sbguru' => set_value('tamat_sbguru'),

	    // perhitungan awal kerja
	    'tgl_awalkerja' => set_value('tgl_awalkerja'),
	    // 'masa_kerja'=> $masakerja['masa_kerja'], 
	    // 'masa_kerja' => set_value('masa_kerja'),


	    'pendidikan_terakhir' => set_value('pendidikan_terakhir'),
	    'program_keahlian' => set_value('program_keahlian'),
	    'golongan' => set_value('golongan'),
	    'status'=>'kepsek',
	    // 'status' => set_value('status'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'spesialisasi' => set_value('spesialisasi'),
	    'jam_ajar' => set_value('jam_ajar'),
	    'password' => set_value('password'),
	    // 'pangkat' => set_value('pangkat'),
	    
	);
        $this->template->load('template','kepsek_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$this->load->helper('masakerja_helper');
    		$masakerja=MasaKerja($this->input->post('tgl_awalkerja'), date('Y'), date('m'), date('d'));

    	$this->load->helper('golongan_helper');
    	$gol = golongan($this->input->post('golongan',TRUE));
            $data = array(
		'nip_pegawai' => $this->input->post('nip_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'nuptk' => $this->input->post('nuptk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jabatan_fungsional' => $gol['jabatan'],
		'tamat_sbguru' => $this->input->post('tamat_sbguru',TRUE),
		'tgl_awalkerja' => $this->input->post('tgl_awalkerja',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'program_keahlian' => $this->input->post('program_keahlian',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'status' => 'Kepsek',
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'spesialisasi' => $this->input->post('spesialisasi',TRUE),
		'pangkat' => $gol['pangkat'],
		'masa_kerja' => $masakerja['masa_kerja'],
		'jam_ajar'=>$this->input->post('jam_ajar',TRUE),
		'password'=>md5($this->input->post('password',TRUE))
	    );
          //   echo "<pre>";
          //   print_r ($data);
          //   echo "</pre>";
          // die();
            $this->Kepsek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kepsek'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kepsek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kepsek/update_action'),
				'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
				'nip_pegawai' => set_value('nip_pegawai', $row->nip_pegawai),
				'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
				'nuptk' => set_value('nuptk', $row->nuptk),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				// 'jabatan_fungsional' => set_value('jabatan_fungsional', $row->jabatan_fungsional),
				'tamat_sbguru' => set_value('tamat_sbguru', $row->tamat_sbguru),
				'tgl_awalkerja' => set_value('tgl_awalkerja', $row->tgl_awalkerja),
				'pendidikan_terakhir' => set_value('pendidikan_terakhir', $row->pendidikan_terakhir),
				'program_keahlian' => set_value('program_keahlian', $row->program_keahlian),
				'golongan' => set_value('golongan', $row->golongan),
				// 'status' => set_value('status', $row->status),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'spesialisasi' => set_value('spesialisasi', $row->spesialisasi),
				'jam_ajar' => set_value('jam_ajar', $row->jam_ajar),
				'masa_kerja' => set_value('masa_kerja', $row->masa_kerja),
				'password'=>set_value('password')
	    );
            $this->template->load('template','kepsek_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsek'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pegawai', TRUE));
        } else {
        	$this->load->helper('masakerja_helper');
    		$masakerja=MasaKerja($this->input->post('tgl_awalkerja'), date('Y'), date('m'), date('d'));

    	$this->load->helper('golongan_helper');
    	$gol = golongan($this->input->post('golongan',TRUE));
            $data = array(
		'nip_pegawai' => $this->input->post('nip_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'nuptk' => $this->input->post('nuptk',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jabatan_fungsional' => $gol['jabatan'],
		'tamat_sbguru' => $this->input->post('tamat_sbguru',TRUE),
		'tgl_awalkerja' => $this->input->post('tgl_awalkerja',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'program_keahlian' => $this->input->post('program_keahlian',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'status' => 'Kepsek',
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'spesialisasi' => $this->input->post('spesialisasi',TRUE),
		'pangkat' => $gol['pangkat'],
		'masa_kerja' => $masakerja['masa_kerja'],
		'jam_ajar'=>$this->input->post('jam_ajar',TRUE),
		'password'=>md5($this->input->post('password',TRUE))
	    );

            $this->Kepsek_model->update($this->input->post('id_pegawai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kepsek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kepsek_model->get_by_id($id);

        if ($row) {
            $this->Kepsek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kepsek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsek'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip_pegawai', 'nip pegawai', 'trim|required');
	$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('nuptk', 'nuptk', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	// $this->form_validation->set_rules('jabatan_fungsional', 'jabatan fungsional', 'trim|required');
	$this->form_validation->set_rules('tamat_sbguru', 'tamat sbguru', 'trim|required');
	$this->form_validation->set_rules('tgl_awalkerja', 'tgl awalkerja', 'trim|required');
	$this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'trim|required');
	$this->form_validation->set_rules('program_keahlian', 'program keahlian', 'trim|required');
	$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
	$this->form_validation->set_rules('jam_ajar', 'jam_ajar', 'trim|numeric|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('spesialisasi', 'spesialisasi', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	// $this->form_validation->set_rules('masa_kerja', 'masa kerja', 'trim|required');

	$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pegawai.xls";
        $judul = "pegawai";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Nuptk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan Fungsional");
	xlsWriteLabel($tablehead, $kolomhead++, "Tamat Sbguru");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Awalkerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Terakhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Keahlian");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Spesialisasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Pangkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Masa Kerja");

	foreach ($this->Kepsek_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nuptk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_fungsional);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tamat_sbguru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_awalkerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_terakhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_keahlian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->spesialisasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pangkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->masa_kerja);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pegawai.doc");

        $data = array(
            'pegawai_data' => $this->Kepsek_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pegawai_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'pegawai_data' => $this->Kepsek_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('pegawai_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('pegawai.pdf', 'D'); 
    }

}

