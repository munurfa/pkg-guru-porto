<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_penilaian extends CI_Controller
{
    
         
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login($this->session->status);
        $this->load->model('Data_penilaian_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data_nilai = $this->Data_penilaian_model->get_all();

        $data = array(
            'button' => 'Create',
            'action' => site_url('data_penilaian/create_action'),
              'id_nilai_kompetensi'    => set_value('id_nilai_kompetensi'),
              'nip_pegawai'            => set_value('nip_pegawai'),
              'tahun_penilaian'        => set_value('tahun_penilaian'),
            'guru'      => $this->Data_penilaian_model->guru(),
            'penilai'      => $this->Data_penilaian_model->penilai(),
        );
 
        $this->template->load('template','data_penilaian_list', $data);
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
        // $tgl_penilaian     = $this->input->post('tgl_penilaian',TRUE);
       
        
        

        // $this->Data_penilaian_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_penilaian/mulai/'. $nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/km1/'.$tgl_penilaian));
        }
    }

     public function mulai($nip_pegawai, $nip_penilai, $tahun_penilaian, $kode_kompetensi='km1',$tgl_penilaian)
    {
            $nilaikom = $this->Data_penilaian_model->nilaikom($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi,$tgl_penilaian);
            
            $data = array(

            'nip_pegawai'        => $nip_pegawai,
            'nip_penilai'       => $nip_penilai,
            'tahun_penilaian'      => $tahun_penilaian,
            'tgl_penilaian' => $tgl_penilaian,
            'nilai'     => $this->Data_penilaian_model->nilai_indikator($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi,$tgl_penilaian)->result(),
            'count'     => $this->Data_penilaian_model->nilai_indikator($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi,$tgl_penilaian)->num_rows(), 
            'kompetensi'        => $this->Data_penilaian_model->kompetensi($kode_kompetensi),
            'nilaikom'        => $nilaikom,
        
        );
            $this->template->load('template','data_penilaian_mulai', $data);
       
    }
    
    public function proses_kom($kode_kompetensi)
    {
        $nip_pegawai=$this->input->post('nip_pegawai');
        $nip_penilai=$this->input->post('nip_penilai');
        $tahun_penilaian=$this->input->post('tahun_penilaian');
        $tgl_penilaian=$this->input->post('tgl_penilaian');
        $nilai     = $this->Data_penilaian_model->nilai_indikator($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi,$tgl_penilaian);
        foreach ($nilai->result() as $n) { 
            $dd[] = array(
                    'nip_pegawai'=>$nip_pegawai,
                    'nip_penilai'=>$nip_penilai,
                    'tgl_penilaian' => $tgl_penilaian,
                    'kode_indikator'=>$n->indikator_kode,
                    'tahun_penilaian'=>$tahun_penilaian,
                    'tgl_penilaian'=>$tgl_penilaian,
                    'skor'=>$this->input->post($n->indikator_kode)

            );
        }
        $this->Data_penilaian_model->proses($dd);

        $total = $this->Data_penilaian_model->total($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)->total;
        $total = (int)$total;
     
        
        $skormax = $nilai->num_rows()*2;
        $presentase = ($total/$skormax)*100;
        if ($presentase<=25) {
            $nilai = 1;
        } else if ($presentase<=50){
            $nilai = 2;
        }else if ($presentase<=75){
            $nilai = 3;
        }else if ($presentase<=100){
            $nilai = 4;
        }
        
        $kompetensi = array(
                    'nip_pegawai'=>$nip_pegawai,
                    'nip_penilai'=>$nip_penilai,
                    'kode_kompetensi'=>$kode_kompetensi,
                    'tahun_penilaian'=>$tahun_penilaian,
                    'tgl_penilaian'=>$tgl_penilaian,
                    'total_skor'=>$total,
                    'skormax'=>$skormax,
                    'presentase' =>round($presentase,2),
                    'nilai_kompetensi' => $nilai
            );
     
       $this->Data_penilaian_model->insertKom($kompetensi);
       redirect(site_url('data_penilaian/mulai/'. $nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$kode_kompetensi.'/'.$tgl_penilaian));
    }

    public function proses_kom_update($kode_kompetensi)
    {
        $nip_pegawai=$this->input->post('nip_pegawai');
        $nip_penilai=$this->input->post('nip_penilai');
        $tahun_penilaian=$this->input->post('tahun_penilaian');
        $tgl_penilaian=$this->input->post('tgl_penilaian');

        $nilai     = $this->Data_penilaian_model->nilai_indikator($nip_pegawai, $nip_penilai, $tahun_penilaian,$kode_kompetensi,$tgl_penilaian);
        foreach ($nilai->result() as $n) { 
            
                    $skor=$this->input->post($n->indikator_kode);
                    $this->Data_penilaian_model->prosesUpdate($skor,$nip_pegawai,$nip_penilai,$n->indikator_kode,$tahun_penilaian,$tgl_penilaian);
         
        }
        

        $total = $this->Data_penilaian_model->total($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)->total;
        $total = (int)$total;
     
        
        $skormax = $nilai->num_rows()*2;
        $presentase = ($total/$skormax)*100;
        if ($presentase<=25) {
            $nilai = 1;
        } else if ($presentase<=50){
            $nilai = 2;
        }else if ($presentase<=75){
            $nilai = 3;
        }else if ($presentase<=100){
            $nilai = 4;
        }
        
        $kompetensi = array(
                    'nip_pegawai'=>$nip_pegawai,
                    'nip_penilai'=>$nip_penilai,
                    'kode_kompetensi'=>$kode_kompetensi,
                    'tahun_penilaian'=>$tahun_penilaian,
                    'tgl_penilaian'=>$tgl_penilaian,
                    'total_skor'=>$total,
                    'skormax'=>$skormax,
                    'presentase' =>round($presentase,2),
                    'nilai_kompetensi' => $nilai
            );
     
       $this->Data_penilaian_model->updateKom($kompetensi);
       redirect(site_url('data_penilaian/mulai/'. $nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$kode_kompetensi.'/'.$tgl_penilaian));
    }

    // public function inputData($kode_kompetensi)
    // {
    //     $data=$this->Data_penilaian_model->nilai_indikator($kode_kompetensi)->result();
    //     $count = $data->num_rows();
    //     for ($i=0; $i <$count ; $i++) { 
    //         $dd[] = array(
    //                 'nip_pegawai'=>
    //                 'nip_penilai'=>
    //                 'kode_indikator'=>
    //                 'tahun_penilaian'=>
    //                 'skor'=>

    //             );
    //     }
    //     foreach ($data as $d) {
    //         $dd['nip_pegawai']=$this->input->post('nip_pegawai');
    //         $dd['nip_penilai']=$this->input->post('nip_penilai');
    //         $dd['kode_indikator']=$d->indikator_kode;
    //         $dd['tahun_penilaian']=$this->input->post('tahun_penilaian');
    //         $dd['skor']=$this->input->post($d->indikator_kode);
    //        echo "<pre>";
    //        print_r ($dd);
    //        echo "</pre>";;
            
    //      }
        
    //      // $data = $this->input->post($d->kode_indikator);
        
        
    // }

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
       
        );

            $this->template->load('template','indikator_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi'));
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
           
        );

        $this->Indikator_model->update($this->input->post('kode_indikator', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('kompetensi'));
        }
    }
    

    
    public function delete($id) 
    {
        $row = $this->Indikator_model->get_by_id($id);

        if ($row) {
            $this->Indikator_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kompetensi'));
        } 
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kompetensi/read'));
        }
    }

    public function _rules() 
    {
        
	$this->form_validation->set_rules('nip_pegawai', 'nip_pegawai', 'trim|required');
	$this->form_validation->set_rules('tahun_penilaian', 'tahun_penilaian', 'trim|required');
		
	$this->form_validation->set_rules('id_nilai_kompetensi', 'id_nilai_kompetensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

     public function _rules_update() 
    {
    // $this->form_validation->set_rules('kode_kompetensi', 'kode_kompetensi', 'trim|required|is_unique[kompetensi.kode_kompetensi]');
    $this->form_validation->set_rules('nama_indikator', 'nama_indikator', 'trim|required');
    
    
    $this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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

