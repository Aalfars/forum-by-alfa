<?php
defined('BASEPATH') or  exit('ngapain coba');
class Konten_model extends CI_Model
{
    public function simpan()
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
    public function getData()
    {

        $this->db->join('kategori','konten.id_kategori = kategori.id_kategori');
        return $this->db->get('konten')->result();
    }
    public function delete_data($foto)
    {
        $where = array('foto' => $foto);
        $this->db->delete('konten', $where);
    }
    public function update_data()
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
}
