<?php 
defined('BASEPATH') OR  exit('ngapain coba');
class Caraousel_model extends CI_Model
{
    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto
        );
        $this->db->insert('caraousel', $data);
}
public function getData()
{ 
    return $this->db->get('caraousel')->result();

    }
    public function delete_data($id)
        {
            $where = array('id_caraousel' => $id);
            $this->db->delete('caraousel',$where);
        }
        public function update_data()
        {  
            
            $data = array(
                'kategori' => $this->input->post('kategori')
                );
    
                $this->db->update('kategori',$data);
            }

}
            