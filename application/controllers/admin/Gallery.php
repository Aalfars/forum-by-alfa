<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');

        $this->load->model('Gallery_model');
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
        $data['title'] = 'Gallery';
        $data['list_caraousel'] = $this->Gallery_model->getData();
        $this->template->load('template_admin','admin/gallery',$data);
        
    }

    public function simpan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/gallery/';
        $config['max_size'] = 3 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/caraousel');  
        }  elseif( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   

        $judul = $this->input->post('nama');
        $this->db->from('galeri');
        $this->db->where('judul', $judul);
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong></strong>Judul Sudah ada yang menggunakan</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
         redirect('admin/gallery');
    }
    $this->Gallery_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> Foto Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('admin/gallery');
}
    public function delete($id){
        $where = array('id_foto' => $id);
        $this->db->delete('galeri',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"> Berhasil menghapus Foto Galeri</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/gallery');

    }
    public function update(){
        date_default_timezone_set("Asia/Jakarta");
        $namafoto = $this->input->post('namafoto');
        $id = $this->input->post('id');
        $config['upload_path']          = 'assets/upload/gallery/';
        $config['max_size'] = 0; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/gallery');  
        }  elseif( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   
     
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text"> Foto Gallery berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Gallery_model->update_data();
        redirect('admin/gallery');
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">Foto Gallery berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->kategori_model->update_data();
        redirect('admin/gallery');
    }
}
    