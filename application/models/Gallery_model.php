<?php 
defined('BASEPATH') OR  exit('ngapain coba');
class Gallery_model extends CI_Model
{
    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto
        );
        $this->db->insert('galeri', $data);
}
public function getData()
{ 
    return $this->db->get('galeri')->result();

    }
    public function delete_data($id)
        {
            $where = array('id_foto' => $id);
            $this->db->delete('galeri',$where);
        }
        public function update_data()
        {  
            
            $data = array(
                'foto' => $this->input->post('foto')
                );
    
                $this->db->update('galeri',$data);
            }

}
            