<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Konten extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');

        $this->load->model('Konten_model');
        if ( $this->session->userdata('logged_in') !== true) {;
            
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
        $data['title'] = 'Konten';
        $data['list_konten'] = $this->Konten_model->getData();
        $this->template->load('template_admin','admin/konten',$data);
        
    }
    
    public function simpan()
    {   
        date_default_timezone_set("Asia/Jakarta");
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size'] = 3 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 3 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('konten/add_konten');  
        }  elseif( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   

        $judul = $this->input->post('judul');
        $this->db->from('Konten');
        $this->db->where('judul', $judul);
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong></strong>Judul Sudah ada yang menggunakan</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
         redirect('admin/konten/add');
        }
        $this->Konten_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text">Konten Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('admin/Konten');
    }
    public function delete($foto){
        $filename=FCPATH.'/assets/upload/konten/'.$foto;
            if (file_exists($filename)){
                unlink("./assets/upload/konten/".$foto);
            }
        $where = array('foto' => $foto);
        $this->db->delete('Konten',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Warning!</strong> Berhasil menghapus Konten</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/Konten');

    }
    public function detail($id){
        $data['title'] = 'Detail Konten';
        $data['konten'] = $this->Konten_model->detail($id);
        $this->template->load('template_admin','admin/detail',$data);

    }
    public function update(){
        date_default_timezone_set("Asia/Jakarta");
        $namafoto = $this->input->post('namafoto');
        $id = $this->input->post('id');
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
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
            redirect('konten/detail/'.$id);  
        }  elseif( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   
     
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">Konten berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Konten_model->update_data();
        redirect('admin/konten');
    }
    public function add(){
        $this->load->model('Kategori_model');
        $data['title'] = 'Tambah Konten';
        $data['list_kategori'] = $this->Kategori_model->getData();
        $this->template->load('template_admin','admin/add_konten',$data);
    }
}
    