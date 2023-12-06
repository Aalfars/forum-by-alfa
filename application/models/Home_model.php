<?php
defined('BASEPATH') or  exit('ngapain coba');
class Home_model extends CI_Model
{
    public function konfigurasi()
    {
        return $this->db->get('konfigurasi')->result();
    }
    public function konten()
    {
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        return $this->db->get('konten')->result();
    }
    public function caraousel()
    {
        return $this->db->get('caraousel')->result();
    }
    public function kategori()
    {
        return $this->db->get('kategori')->result();
    }


    public function detail($slug)
    {
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        return $this->db->get_where('konten', array('slug' => $slug))->result();
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('judul', $keyword);
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $query = $this->db->get('konten'); // Gantilah 'nama_tabel_anda' dengan nama tabel Anda
        return $query->result();
    }
    public function saran()
    {
        $data = array(
            'saran' => $this->input->post('saran'),
            'username' => $this->session->userdata('username')
        );
        $this->db->insert('saran', $data);
    }
    public function konten_home($limit = 5)
    {
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('konten', $limit);
        return $query->result();
    }
    public function get_gallery(){
        return $this->db->get("galeri")->result();
    }
    public function recent_post($limit = 5)
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('konten', $limit);
        return $query->result();
    }
    public function all_kategori()
    {
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->order_by('kategori','ASC');
        return $this->db->get('konten')->result();
    }

    public function search_kategori($keyword)
    {
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        return $this->db->get_where('konten', array('konten.id_kategori' => $keyword))->result();
    }
    public function komen($data)
    {
        $this->db->insert('komen', $data);
    }
    public function get_komen($slug)
    {
        $this->db->join('akun', 'komen.username = akun.username');
        $this->db->join('konten', 'komen.id_konten = konten.id_konten');
        $this->db->where('komen.slug', $slug);
        return $this->db->get('komen')->result();
    }
    public function get_konten_paginated($limit, $offset) {
        $this->db->select('konten.*, akun.username as nama_pengguna, kategori.kategori');
        $this->db->from('konten');
        $this->db->join('akun', 'konten.username = akun.username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get();
    
        return $query->result_array();
    
    }
    public function jumlah_konten() {
        return $this->db->count_all('konten'); // Gantilah 'nama_tabel_konten' dengan nama tabel yang sesuai
    }
}
