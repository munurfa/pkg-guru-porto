<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{ 
    
        
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login($this->session->status);
        $this->load->model('Kompetensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kompetensi = $this->Kompetensi_model->get_all();

        $data = array(
            'kompetensi_data' => $kompetensi
        );

        $this->template->load('template','kompetensi_list', $data);
    }

    public function read($id) 
    { 
        $row = $this->Kompetensi_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_kompetensi' 	=> $row->id_kompetensi,
				'kode_kompetensi' 	=> $row->kode_kompetensi,
				'nama_kompetensi' 	=> $row->nama_kompetensi,
				'jenis_kompetensi'	=> $row->jenis_kompetensi,
				'cara_menilai' 		=> $row->cara_menilai,
				'indikator'         => $this->Kompetensi_model->get_indikator($id),
	    	);
            $this->template->load('template','kompetensi_read', $data);
        }

        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi'));
        }
    }

    public function create() 
    	{	
    		// $masakerja=MasaKerja($this->input->post('tgl_awalkerja'), date('Y'), date('m'), date('d'));

        	$data = array(
		            'button' => 'Create',
		            'action' => site_url('kompetensi/create_action'),

			        'id_kompetensi'			=> set_value('id_kompetensi'),
				    'kode_kompetensi'		=> set_value('kode_kompetensi'),
				    'nama_kompetensi' 		=> set_value('nama_kompetensi'),
				    'jenis_kompetensi'		=> set_value('jenis_kompetensi'),
				    'cara_menilai' 			=> set_value('cara_menilai'),
				      
			);
        	
        $this->template->load('template','kompetensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        	} 
        else { 

        $data = array(
		'id_kompetensi' 		=> $this->input->post('id_kompetensi',TRUE),
		'kode_kompetensi' 		=> $this->input->post('kode_kompetensi',TRUE),
		'nama_kompetensi'		=> $this->input->post('nama_kompetensi',TRUE),
		'jenis_kompetensi'		=> $this->input->post('jenis_kompetensi',TRUE),
		'cara_menilai' 			=> $this->input->post('cara_menilai',TRUE),
		
	    );

        $this->Kompetensi_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kompetensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kompetensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kompetensi/update_action'),

		'id_kompetensi' 	=> set_value('id_kompetensi', $row->id_kompetensi),
		'kode_kompetensi' 	=> set_value('kode_kompetensi', $row->kode_kompetensi),
		'nama_kompetensi' 	=> set_value('nama_kompetensi', $row->nama_kompetensi),
		'jenis_kompetensi'	=> set_value('jenis_kompetensi', $row->jenis_kompetensi),
		'cara_menilai' 		=> set_value('cara_menilai', $row->cara_menilai),
	    );
            $this->template->load('template','kompetensi_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules_update();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_kompetensi', TRUE));
        } else {
            $data = array(
			'id_kompetensi' 		=> $this->input->post('id_kompetensi',TRUE),
			// 'kode_kompetensi' 		=> $this->input->post('kode_kompetensi',TRUE),
			'nama_kompetensi'			=> $this->input->post('nama_kompetensi',TRUE),
			'jenis_kompetensi'			=> $this->input->post('jenis_kompetensi',TRUE),

			'cara_menilai' 			=> $this->input->post('cara_menilai',TRUE),
	    );

        $this->Kompetensi_model->update($this->input->post('kode_kompetensi', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('kompetensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kompetensi_model->get_by_id($id);

        if ($row) {
            $this->Kompetensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kompetensi/read'));
        } 
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kompetensi', 'kode_kompetensi', 'trim|required|is_unique[kompetensi.kode_kompetensi]');
	$this->form_validation->set_rules('nama_kompetensi', 'nama_kompetensi', 'trim|required');
	$this->form_validation->set_rules('jenis_kompetensi', 'jenis_kompetensi', 'trim|required');
	$this->form_validation->set_rules('cara_menilai', 'cara_menilai', 'trim|required');
	
	$this->form_validation->set_rules('id_kompetensi', 'id_kompetensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
     public function _rules_update() 
    {
    // $this->form_validation->set_rules('kode_kompetensi', 'kode_kompetensi', 'trim|required|is_unique[kompetensi.kode_kompetensi]');
    $this->form_validation->set_rules('nama_kompetensi', 'nama_kompetensi', 'trim|required');
    $this->form_validation->set_rules('jenis_kompetensi', 'jenis_kompetensi', 'trim|required');
    $this->form_validation->set_rules('cara_menilai', 'cara_menilai', 'trim|required');
    
    $this->form_validation->set_rules('id_kompetensi', 'id_kompetensi', 'trim');
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

