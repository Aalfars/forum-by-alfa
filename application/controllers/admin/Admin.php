<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Admin_model');
        if ( $this->session->userdata('level') == 'Admin') {;
        } else{;
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Login dulu bosku</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
            ');
            redirect('Auth');  
            
        };
    }
    public function index(){
        $data = array(
            'jumlah_user' => $this->Admin_model->hitung_user(),
            'jumlah_kategori'=>$this->Admin_model->hitung_kategori(),
            'jumlah_konten'=>$this->Admin_model->hitung_konten(),
            'jumlah_saran' =>$this->Admin_model->hitung_saran(),
            'title' => "Dashboard",
        );
        $this->template->load('template_admin','admin/dashboard', $data);
        
    }
    
    public function list_user(){
        $data = array(
            'list_user' =>  $this->Admin_model->getData(),
            'title' => "List User",
        );
        $this->template->load('template_admin','admin/list_user',$data);
    }
    public function tambah_user()
    {
        $data = array(
            'title' => "Tambah User",
        );
        $this->template->load('template_admin','admin/adduser',$data);
    }
    public function simpan()
    {
        $username = $this->input->post('username');
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
         redirect('admin/list_user');
        }
        $this->Admin_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> User Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('admin/list_user');
    }
    public function delete_user($id){
        $where = array('user_id' => $id);
        $this->db->delete('akun',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text">Berhasil menghapus akun</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/list_user');

    }
    public function edit_user($id){
        $data = array(
            'user' => $this->Admin_model->tampil_by_id($id),
            'title' => "Edit User",
        );
        $this->template->load('template_admin','admin/edit_user',$data);
        
    }    
    public function update_user(){
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">user berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Admin_model->update_data();
        redirect('admin/list_user');
        flashdata('Data berhasil di update');
    }
    public function adduser()
    {
        $data = array(
            'title' => "Tambah User",
        );   
        $this->template->load('template_admin','admin/adduser',$data);
    }
   
}
    