<?php 
defined('BASEPATH') OR  exit('ngapain coba');
class User_model extends CI_Model
{
    public function get_konten(){
        $username = $this->session->userdata('username');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        return $this->db->get_where('konten', ['username' => $username])->result();
    }
    public function simpan_konten()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'isi_konten' => $this->input->post('isi'),
            'judul' => $this->input->post('judul'),
            'username' => $this->session->userdata('username'),
            'tanggal' => date('Y-m-d'),
            'foto' => $namafoto,
            'slug' => str_replace(' ', '-', $this->input->post('judul'))
        );
        $this->db->insert('konten', $data);
    }
    public function delete_konten($foto)
    {
        $where = array('foto' => $foto);
        $this->db->delete('konten', $where);
    }
    public function update_konten()
    {            
        $id = $this->input->post('id');
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'isi_konten' => $this->input->post('isi'),
            'judul' => $this->input->post('judul'),
            'username' => $this->session->userdata('username'),
            'slug' => str_replace(' ', '-', $this->input->post('judul'))        );
        $this->db->where('id_konten', $id);
        $this->db->update('konten', $data);
    }
    public function detail($id)
    {
        $this->db->join('kategori','konten.id_kategori = kategori.id_kategori');
        return $this->db->get_where('konten', array('id_konten' => $id))->result();
        
    }
    public function my_kategori(){
        $username = $this->session->userdata('user_id');
        return $this->db->get_where('kategori', ['user_id' => $username])->result();
    }
    public function hitung_konten(){
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        $query = $this->db->get('konten');
        return $query->num_rows();
    }
    public function hitung_kategori(){
        $username = $this->session->userdata('user_id');
        $this->db->where('user_id', $username);
        $query = $this->db->get('kategori');
        return $query->num_rows();
    }
    public function hitung_saran(){
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        $query = $this->db->get('saran');
        return $query->num_rows();
    }



}
?>