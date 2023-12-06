<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');

        $this->load->model('Kategori_model');
        if ( $this->session->userdata('level') !== 'Admin') {;
            
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
        $data['title'] = 'Kategori';
        $data['list_kategori'] = $this->Kategori_model->getData();
        $this->template->load('template_admin','admin/kategori',$data);
        
    }
    
    public function simpan()
    {
        $username = $this->input->post('kategori');
        $this->db->from('kategori');
        $this->db->where('kategori', $username);
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Warning!</strong>Kategori Sudah Ada</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
         redirect('admin/kategori');
        }
        $this->Kategori_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text">Kategori Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('admin/kategori');
    }
    public function delete($id){
        $where = array('id_kategori' => $id);
        $this->db->delete('kategori',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Warning!</strong> Berhasil menghapus Kategori</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/kategori');

    }
    public function update(){
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">Kategori berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Kategori_model->update_data();
        redirect('admin/kategori');
    }
}
    