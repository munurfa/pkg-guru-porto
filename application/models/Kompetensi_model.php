<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kompetensi_model extends CI_Model
{

    public $table = 'kompetensi';
    public $id = 'kode_kompetensi';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    


    // get all
    function get_all()
    {
        $sql = "SELECT * FROM `kompetensi` ORDER BY cast(substr(kode_kompetensi,3) as unsigned) ASC";
        return $this->db->query($sql)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where("kode_kompetensi", $id);
        return $this->db->get($this->table)->row();
    }
    

    //indikator
    function get_indikator($id)
    {
        $sql = "select * from indikator where kode_kompetensi = ? ";
        return $this->db->query($sql, array($id))->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kompetensi', $q);
	    $this->db->or_like('kode_kompetensi', $q);
	    $this->db->or_like('nama_kompetensi', $q);
        $this->db->or_like('jenis_kompetensi', $q);
	    $this->db->or_like('cara_menilai', $q);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kompetensi', $q);
        $this->db->or_like('kode_kompetensi', $q);
        $this->db->or_like('nama_kompetensi', $q);
        $this->db->or_like('jenis_kompetensi', $q);
        $this->db->or_like('cara_menilai', $q);
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