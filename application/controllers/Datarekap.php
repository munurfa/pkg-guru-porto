<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datarekap extends CI_Controller {

	function __construct()
	{
		 parent::__construct();
        $this->simple_login->cek_login($this->session->status);
        $this->load->model('Data_rekap_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
	}

	public function index()
	{
		// $data_nilai = $this->Data_penilaian_model->get_all();

        $data = array(
            'button' => 'Create',
            'action' => site_url('datarekap/create_action'),
              'id_nilai_kompetensi'    => set_value('id_nilai_kompetensi'),
              'nip_pegawai'            => set_value('nip_pegawai'),
              'tahun_penilaian'        => set_value('tahun_penilaian'),
            'guru'      => $this->Data_rekap_model->guru(),
            'penilai'      => $this->Data_rekap_model->penilai(),
        );
 
        $this->template->load('template','data_rekap_form', $data);
	}
	public function create_action() 
    {
       $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            } 
        else { 

        $nip_pegawai         = $this->input->post('nip_pegawai',TRUE);
        $nip_penilai         = $this->input->post('nip_penilai',TRUE);
        $tahun_penilaian     = $this->input->post('tahun_penilaian',TRUE);
        $tgl_penilaian     = $this->input->post('tgl_penilaian',TRUE);
       
        // $this->Data_penilaian_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');


        redirect(site_url('datarekap/mulai/'. $nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$tgl_penilaian));
        }
    }

    public function mulai($nip_pegawai, $nip_penilai, $tahun_penilaian,$tgl_penilaian)
    {
            $nilaikom = $this->Data_rekap_model->nilaikom($nip_pegawai, $nip_penilai, $tahun_penilaian,$tgl_penilaian);
            
            $data = array(

            'nip_pegawai'        => $nip_pegawai,
            'nip_penilai'       => $nip_penilai,
            'tahun_penilaian'      => $tahun_penilaian,
            'tgl_penilaian'      => $tgl_penilaian,
            'guru'     => $this->Data_rekap_model->gurusatu($nip_pegawai)->row(),
            // 'count'     => $this->Data_penilaian_model->nilai_indikator($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi)->num_rows(), 
            // 'kompetensi'        => $this->Data_penilaian_model->kompetensi($kode_kompetensi),
            'nilaikom'        => $nilaikom,
            'totalnilaikom'        => $this->Data_rekap_model->totalnilaikom($nip_pegawai, $nip_penilai, $tahun_penilaian,$tgl_penilaian),
        
        );
            $this->template->load('template','data_rekap_mulai', $data);
       
    }


    public function _rules() 
    {
        
	$this->form_validation->set_rules('nip_pegawai', 'nip_pegawai', 'trim|required');
	$this->form_validation->set_rules('tahun_penilaian', 'tahun_penilaian', 'trim|required');
		
	$this->form_validation->set_rules('id_nilai_kompetensi', 'id_nilai_kompetensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }




    public function laporan_pdf($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian){

    $this->load->helper('Golongan_helper');
    $this->load->helper('masakerja_helper');
    $data = array(
        'periode'    => $tahun_penilaian,
        'tanggal'    => $tgl_penilaian,
        'guru'       => $this->Data_rekap_model->identitas_guru($nip_pegawai),
        'penilai'    => $this->Data_rekap_model->identitas_penilai($nip_penilai),
        'kompetensi' => $this->Data_rekap_model->kompetensi(),
     
       
    
    );
    // $this->load->view('laporan_pdf', $data);

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = $this->Data_rekap_model->identitas_guru($nip_pegawai)->nama_pegawai.".pdf";
    $this->pdf->load_view('laporan_pdf', $data);
    


}
  public function identitas_pdf($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian){

    $this->load->helper('Golongan_helper');
    $this->load->helper('masakerja_helper');
    $data = array(
        'periode'    => $tahun_penilaian,
        'tanggal'    => $tgl_penilaian,
        'guru'       => $this->Data_rekap_model->identitas_guru($nip_pegawai),
        'penilai'    => $this->Data_rekap_model->identitas_penilai($nip_penilai),
        'kompetensi' => $this->Data_rekap_model->kompetensi(),
     
       
    
    );
    // $this->load->view('laporan_pdf', $data);

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = $this->Data_rekap_model->identitas_guru($nip_pegawai)->nama_pegawai."_identitas.pdf";
    $this->pdf->load_view('identitas_pdf', $data);
    


}
    public function laporan_rekap_pdf($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian){

    $this->load->helper('Golongan_helper');
    $this->load->helper('masakerja_helper');
    $data = array(
        'periode'    => $tahun_penilaian,
        'tanggal'    => $tgl_penilaian,
        'guru'       => $this->Data_rekap_model->identitas_guru($nip_pegawai),
        'penilai'    => $this->Data_rekap_model->identitas_penilai($nip_penilai),
        
        'nilaikom'   => $this->Data_rekap_model->nilaikom($nip_pegawai, $nip_penilai, $tahun_penilaian,$tgl_penilaian),
        'totalnilaikom' => $this->Data_rekap_model->totalnilaikom($nip_pegawai, $nip_penilai, $tahun_penilaian,$tgl_penilaian),
       
    
    );
    // $this->load->view('laporan_pdf', $data);

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = $this->Data_rekap_model->identitas_guru($nip_pegawai)->nama_pegawai."_rekap.pdf";
    $this->pdf->load_view('laporan_rekap_pdf', $data);
    


}

}

/* End of file Datarekap.php */
/* Location: ./application/controllers/Datarekap.php */