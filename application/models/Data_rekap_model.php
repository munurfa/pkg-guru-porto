<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rekap_model extends CI_Model {
	public $table = 'nilai_rekap';
    // public $id = 'kode_kompetensi';
    // public $order = 'DESC';
	
	 function guru()
    {
        // $this->db->order_by($this->id, $this->order);
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
    function gurusatu($nip_pegawai)
    {
        // $this->db->order_by($this->id, $this->order);
        $result =  $this->db->query("select * from pegawai where status = 'guru' and nip_pegawai = ?",$nip_pegawai);
        return $result;
        // return $this->db->get($this->table)->result();
    }
    function penilai()
    {
        // $this->db->order_by($this->id, $this->order);
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

    function nilaiKom($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian)
    {
        $sql = "SELECT a.*,b.* FROM kompetensi  as a
        		left join nilai_kompetensi as b on a.kode_kompetensi = b.kode_kompetensi
                AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ? AND b.tgl_penilaian = ?
                ORDER BY cast(substr(a.kode_kompetensi,3) as unsigned) ASC";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian));
    }
    function totalnilaiKom($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian)
    {
        $sql = "SELECT SUM(nilai_kompetensi) as total FROM kompetensi  as a
        		left join nilai_kompetensi as b on a.kode_kompetensi = b.kode_kompetensi
                AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ? AND b.tgl_penilaian = ?
                ORDER BY cast(substr(a.kode_kompetensi,3) as unsigned) ASC";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian))->row();
    }


    // REKAP LAPORAN
    function identitas_guru($nip)
    {
        $this->db->where('nip_pegawai', $nip);
        return $this->db->get('pegawai')->row();
    }
    function identitas_penilai($nip)
    {
        $this->db->where('nip_penilai', $nip);
        return $this->db->get('penilai')->row();
    }
    function kompetensi()
    {
        $sql = "SELECT * FROM `kompetensi` ORDER BY cast(substr(kode_kompetensi,3) as unsigned) ASC";
        return $this->db->query($sql);
    }
    function nilai_indikator($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {

        $sql = "SELECT a.*, b.*,a.kode_indikator as indikator_kode FROM indikator as a 
                LEFT JOIN nilai_indikator as b on a.kode_indikator = b.kode_indikator 
                    AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ?  AND b.tgl_penilaian = ?
                WHERE a.kode_kompetensi = ?";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi));

    }
     function total($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {

        $sql = "SELECT SUM(skor) as total FROM indikator as a 
                LEFT JOIN nilai_indikator as b on a.kode_indikator = b.kode_indikator 
                    AND b.nip_pegawai = ? AND b.nip_penilai = ? AND b.tahun_penilaian = ? AND b.tgl_penilaian = ?
                WHERE a.kode_kompetensi = ? LIMIT 1";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi))->row();
 
    }
    function nilaiKomakhir($nip_pegawai,$nip_penilai,$tahun_penilaian,$kode_kompetensi,$tgl_penilaian)
    {
        $sql = "SELECT * FROM nilai_kompetensi  
                WHERE nip_pegawai = ? AND nip_penilai = ? AND tahun_penilaian = ? AND tgl_penilaian = ?
                AND kode_kompetensi = ? LIMIT 1";
        
        return $this->db->query($sql, array($nip_pegawai,$nip_penilai,$tahun_penilaian,$tgl_penilaian,$kode_kompetensi));
    }
}

/* End of file Data_rekap.php */
/* Location: ./application/models/Data_rekap.php */