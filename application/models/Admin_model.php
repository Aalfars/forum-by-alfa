<?php 
defined('BASEPATH') OR  exit('ngapain coba');
class Admin_model extends CI_Model
{
    public function simpan()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
            'nama'     => $this->input->post('nama'),
            'level'    => $this->input->post('level'),
            'status'   => $this->input->post('status')
        );
        $this->db->insert('akun', $data);
}
public function getData()
{ 
    return $this->db->get('akun')->result();

    }
    public function delete_data($id)
        {
            $where = array('user_id' => $id);
            $this->db->delete('akun',$where);
        }
        function tampil_by_id($id)
        {
            $query = $this->db->get_where('akun', array('user_id' => $id));
            return $query->row();
        }
        public function update_data()
        {  
            $pass = $this->input->post('password');
            if($pass>0){
                $passin = password_hash($pass,PASSWORD_BCRYPT);
                $data=array (
                    'password' => $passin
                );
            }
            $data = array(
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
                
                );
    
                $this->db->update('akun',$data);
            }
            public function get_saran(){
                return $this->db->get('saran')->result();
            }
            public function delete_saran($id){
                $where = array('id_saran' => $id);
                $this->db->delete('saran',$where);
            }
            public function hitung_konten(){
                return $this->db->count_all("konten");
            }
            public function hitung_Kategori(){
                return $this->db->count_all("kategori");
            }
            public function hitung_Saran(){
                return $this->db->count_all("saran");
                }
            public function hitung_user(){
                return $this->db->count_all("akun");
            }
            public function hitung_galeri(){
                return $this->db->count_all("galeri");
            }

}
            