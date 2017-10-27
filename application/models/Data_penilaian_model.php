<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_penilaian_model extends CI_Model
{
    public $table = 'nilai_kompetensi';
    public $id = 'kode_kompetensi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    } 

    function guru()
    {
        $this->db->order_by($this->id, $this->order);
        $result =  $this->db->query("select * from pegawai where status = 'guru'");
        $dd['']='Pilih Guru';
        if ($result->num_rows()>0){
            foreach ($result->result()as $row) {
                # code...
            $dd[$row->nip_pegawai] = $row->nama_pegawai.' ('.$row->nip_pegawai.')';
            }
        }
        return $dd;
        // return $this->db->get($this->table)->result();
    }

      function penilai()
    {
        $this->db->order_by($this->id, $this->order);
        $result =  $this->db->query("select * from penilai");
        $dd['']='Pilih penilai';
        if ($result->num_rows()>0){
            foreach ($result->result()as $row) {
                # code...
            $dd[$row->nip_penilai] = $row->nama.' ('.$row->nip_penilai.' - '.$row->status.')';
            }
        }
        return $dd;
        // return $this->db->get($this->table)->result();
    }

    function nilai_indikator($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {

        $sql = "SELECT a.*, b.*,a.kode_indikator as indikator_kode FROM indikator as a 
                LEFT JOIN nilai_indikator as b on a.kode_indikator = b.kode_indikator 
                    AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ?  AND b.tgl_penilaian = ?
                WHERE a.kode_kompetensi = ?";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi));

    }


    function kompetensi($id)
    {
        $this->db->where("kode_kompetensi", $id);
        return $this->db->get('kompetensi')->row();
    }
    // proses input nilai indikator
    function proses($data)
    {
        $this->db->insert_batch('nilai_indikator', $data);
    }
    function prosesUpdate($skor,$nip_pegawai,$nip_penilai,$kode_indikator,$tahun_penilaian,$tgl_penilaian)
    {
        $array = array('nip_pegawai'=>$nip_pegawai, 'nip_penilai'=>$nip_penilai, 'kode_indikator' => $kode_indikator,'tahun_penilaian'=>$tahun_penilaian,'tgl_penilaian'=>$tgl_penilaian);
        $this->db->set('skor',$skor);
        $this->db->where($array); 
        $this->db->update('nilai_indikator');
    }
    function insertKom($data)
    {
        $this->db->insert('nilai_kompetensi', $data);
    }
    function updateKom($data)
    {
        $array = array('nip_pegawai'=>$data['nip_pegawai'], 'nip_penilai'=>$data['nip_penilai'], 'kode_kompetensi' => $data['kode_kompetensi'],'tahun_penilaian'=>$data['tahun_penilaian'],'tgl_penilaian'=>$data['tgl_penilaian']);

        $this->db->where($array); 
        $this->db->update('nilai_kompetensi', $data);
    }
    function total($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {

        $sql = "SELECT SUM(skor) as total FROM indikator as a 
                LEFT JOIN nilai_indikator as b on a.kode_indikator = b.kode_indikator 
                    AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ? AND b.tgl_penilaian = ?
                WHERE a.kode_kompetensi = ? LIMIT 1";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi))->row();
 
    }
    function nilaiKom($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {
        $sql = "SELECT * FROM nilai_kompetensi  
                WHERE nip_pegawai = ? AND nip_penilai = ? AND tahun_penilaian = ? AND tgl_penilaian = ?
                AND kode_kompetensi = ? LIMIT 1";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi));
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        // $this->db->where($this->id, $id);
        $this->db->where("kode_kompetensi", $id);
        return $this->db->get($this->table)->row();
    }

    function get_option() {
          return $this->db->get("pegawai");
    }
    
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_nilai_kompetensi', $q);
	    $this->db->or_like('kode_nilai_kompetensi', $q);
        $this->db->or_like('nip_pegawai', $q);
	    $this->db->or_like('kode_kompetensi', $q);
        $this->db->or_like('kode_indikator', $q);
        $this->db->or_like('tahun_penilaian', $q);
        $this->db->or_like('total_skor', $q);
        $this->db->or_like('skormax', $q);
        $this->db->or_like('presentase', $q);
        $this->db->or_like('nilai_kompetensi', $q);

	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nilai_kompetensi', $q);
        $this->db->or_like('kode_nilai_kompetensi', $q);
        $this->db->or_like('nip_pegawai', $q);
        $this->db->or_like('kode_kompetensi', $q);
        $this->db->or_like('kode_indikator', $q);
        $this->db->or_like('tahun_penilaian', $q);
        $this->db->or_like('total_skor', $q);
        $this->db->or_like('skormax', $q);
        $this->db->or_like('presentase', $q);
        $this->db->or_like('nilai_kompetensi', $q);
      
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        // $this->db->insert('pegawai',$data);
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Kepsek_model.php */
/* Location: ./application/models/Kepsek_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-18 06:23:46 */
/* http://harviacode.com */