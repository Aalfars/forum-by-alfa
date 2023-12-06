<?php 
defined('BASEPATH') OR  exit('ngapain coba');
class Kategori_model extends CI_Model
{
    public function simpan()
    {
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'user_id' => $this->session->userdata('user_id')
        );
        $this->db->insert('kategori', $data);
}
public function getData()
{ 
    return $this->db->get('kategori')->result();

    }
    public function delete_data($id)
        {
            $where = array('id_kategori' => $id);
            $this->db->delete('kategori',$where);
        }
        public function update_data()
        {  
            $data = array(
                'kategori' => $this->input->post('kategori')
                );
                $this->db->where('id_kategori', $this->input->post('id_kategori'));
                $this->db->update('kategori',$data);
            }

}
            