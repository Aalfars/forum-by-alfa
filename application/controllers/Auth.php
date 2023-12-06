<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index(){
        $this->load->view('auth/Login');
    }
    public function process_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        
        $process = $this->Auth_model->get_username($username);

        if ($process && password_verify($password, $process->password)){
            if ($process->status == 'aktif') {
                $userdata = array(
                    'user_id' => $process->user_id,
                    'username' => $process->username,
				    'nama' => $process->nama,
				    'level' =>$process->level,
                    'status'=>$process->status,
                    'logged_in' => true
                );
                date_default_timezone_set('Asia/Jakarta');
                $data = array(
                    'recent_login' => date('Y-m-d H:i:s')
                    );
                    $this->db->where('user_id', $process->user_id);
                    $this->db->update('akun',$data);
                $this->session->set_userdata($userdata);
                switch ($process->level) {
                    case 'Admin':
                        redirect('home');    
                        break;
                    case 'User':
                        redirect('home');
                        break;
                    }
            } else {
                $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Akunmu nonaktif hubungin admin untuk lebih lengkapnya</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            ');
                $this->load->view('auth/login');
            }
        } else{
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Username atau password salah</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            ');
       
            }
            $this->load->view('auth/Login');
        }
    
    
    public function signup(){
        $this->load->view('auth/signup');
    }
    public function process_signup(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $nama = $this->input->post('nama');
        $level = 'user';
        $status = 'aktif';
        

        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
        $this->db->from('akun');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Warning!</strong> username telah dipakai</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('auth/signup');
    }
        $data = array(
            'username' => $username,
            'password' => $hashed_password,
            'nama' => $nama,
            'level' => $level,
            'status'=> $status
        );
        $this->db->insert('akun',$data);
        redirect('auth');
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Warning!</strong> Berhasil Logout </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('auth');
    }
    public function alih(){
        switch ($this->session->userdata('level')) {
            case 'Admin':
                redirect('admin/admin');    
                break;
            case 'User':
                redirect('user');
                break;
            }
    }
}

?>