<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepsek_model extends CI_Model
{

    public $table = 'pegawai';
    public $id = 'id_pegawai';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->query("select * from pegawai where status = 'kepsek'")->result();
        // return $this->db->get($this->table)->result();

    }

    function laporan_kepsek($nip_pegawai)
    {
        $this->db->where('nip_pegawai', $nip_pegawai);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pegawai', $q);
	$this->db->or_like('nip_pegawai', $q);
	$this->db->or_like('nama_pegawai', $q);
	$this->db->or_like('nuptk', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jabatan_fungsional', $q);
	$this->db->or_like('tamat_sbguru', $q);
	$this->db->or_like('tgl_awalkerja', $q);
	$this->db->or_like('pendidikan_terakhir', $q);
	$this->db->or_like('program_keahlian', $q);
	$this->db->or_like('golongan', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('spesialisasi', $q);
	$this->db->or_like('pangkat', $q);
	$this->db->or_like('masa_kerja', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pegawai', $q);
	$this->db->or_like('nip_pegawai', $q);
	$this->db->or_like('nama_pegawai', $q);
	$this->db->or_like('nuptk', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jabatan_fungsional', $q);
	$this->db->or_like('tamat_sbguru', $q);
	$this->db->or_like('tgl_awalkerja', $q);
	$this->db->or_like('pendidikan_terakhir', $q);
	$this->db->or_like('program_keahlian', $q);
	$this->db->or_like('golongan', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('spesialisasi', $q);
	$this->db->or_like('pangkat', $q);
	$this->db->or_like('masa_kerja', $q);
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