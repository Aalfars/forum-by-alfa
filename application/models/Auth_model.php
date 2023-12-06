<?php 
class Auth_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    public function get_username($username){
        $query = $this->db->get_where('akun', array('username' => $username));
        return $query->row();
    }
    public function insert($data){
        
    }    
}
?>