<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indikator extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login($this->session->status);
        $this->load->model('Indikator_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $indikator = $this->Indikator_model->get_all();

        $data = array(
            'indikator_data' => $indikator
        );

        $this->template->load('template','kompetensi_read', $data);
    }


    
    public function create($kode_kompetensi) 
    	{	
        	$data = array(
		            'button' => 'Create',
		            'action' => site_url('indikator/create_action'),

			        'id_indikator'			=> set_value('id_indikator'),
				    'kode_indikator'		=> set_value('kode_indikator'),
                    'nama_indikator' 		=> set_value('nama_indikator'),
				    
			);
        	
        $this->template->load('template','indikator_form', $data);
    } 
 
    public function create_action() 
    {
        $kode_kompetensi=$this->input->post('kode_kompetensi');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($kode_kompetensi);
        	} 
        else { 

        $data = array(
		// 'id_indikator' 		     => $this->input->post('id_indikator',TRUE),
		'kode_indikator' 		 => $this->input->post('kode_indikator',TRUE),
        'kode_kompetensi'        => $this->input->post('kode_kompetensi',TRUE),
        'nama_indikator'		 => $this->input->post('nama_indikator',TRUE),
		
	    );

        $this->Indikator_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kompetensi/read/'. $kode_kompetensi));
        }
    }

     public function update($id) 
    {
        $row = $this->Indikator_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('indikator/update_action'),

        'id_indikator'     => set_value('id_indikator', $row->id_indikator),
        'kode_indikator'   => set_value('kode_indikator', $row->kode_indikator),
        'nama_indikator'   => set_value('nama_indikator', $row->nama_indikator),
        'kode_kompetensi'   => $row->kode_kompetensi,
       
        );

            $this->template->load('template','indikator_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi/read/'. $row->kode_kompetensi));
        }
    }
    
    public function update_action() 
    {
        $this->_rules_update();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_indikator', TRUE));
        } else {
            $data = array(
            'id_indikator'         => $this->input->post('id_indikator',TRUE),
            'nama_indikator'           => $this->input->post('nama_indikator',TRUE),
            // 'kode_kompetensi'           => $this->input->post('kode_kompetensi',TRUE),
           
        );

        $this->Indikator_model->update($this->input->post('kode_indikator', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('kompetensi/read/'. $this->input->post('kode_kompetensi', TRUE)));
    }
        
    }
    
  
    public function delete($id) 
    {
        $row = $this->Indikator_model->get_by_id($id);

        if ($row) {
            $this->Indikator_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kompetensi/read/'. $row->kode_kompetensi));
        } 
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi/read/'. $row->kode_kompetensi));
        }
    }

   //  function getkodeunik($table) { 
   //      $q = $this->db->query("SELECT MAX(RIGHT(kode_indikator,4)) AS idmax FROM ".$table);
   //      $kd = ""; //kode awal
   //      if($q->num_rows()>0){ //jika data ada
   //          foreach($q->result() as $k){
   //              $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
   //              $kd = sprintf("s", $tmp); //kode ambil 4 karakter terakhir
   //          }
   //      }else{ //jika data kosong diset ke kode awal
   //          $kd = "0001";
   //      }
   //      $kar = "INDI."; //karakter depan kodenya
   //      //gabungkan string dengan kode yang telah dibuat tadi
   //      return $kar.$kd;
   // } 
    public function _rules() 
    {
        
	$this->form_validation->set_rules('kode_indikator', 'kode_indikator', 'trim|required');
	$this->form_validation->set_rules('nama_indikator', 'nama_indikator', 'trim|required');
		
	$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

     public function _rules_update() 
    {
    // $this->form_validation->set_rules('kode_kompetensi', 'kode_kompetensi', 'trim|required|is_unique[kompetensi.kode_kompetensi]');
    $this->form_validation->set_rules('nama_indikator', 'nama_indikator', 'trim|required');
    
    
    $this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim');
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

