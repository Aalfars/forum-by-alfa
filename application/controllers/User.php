<?php 
defined('BASEPATH') OR exit('No direcy script access allowed');
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('template');
        if ( $this->session->userdata('level') !== 'User') {;
            
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Bukan tempat anda</strong></span>
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
            'title' => 'Dashboard',
            'jumlah_konten' => $this->User_model->hitung_konten(),
            'jumlah_saran' => $this->User_model->hitung_saran(),
            'jumlah_kategori' => $this->User_model->hitung_kategori(),
        );
        $this->template->load('template_user','user/dashboard',$data);
    }
    public function konten(){
        $data = array(
            'title' => 'Konten',
            'list_konten' => $this->User_model->get_konten(),
            );
            $this->template->load('template_user','user/konten',$data);
    }
    public function add_konten()
    {   
        date_default_timezone_set("Asia/Jakarta");
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('user/add');  
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
         redirect('user/add');
        }
        $this->User_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> Konten Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('user/Konten');
    }
    public function delete($id){
        $filename=FCPATH.'/assets/upload/konten/'.$id;
            if (file_exists($filename)){
                unlink("./assets/upload/konten/".$id);
            }
        $where = array('foto' => $id);
        $this->db->delete('Konten',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong></strong> Berhasil menghapus Konten</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/Konten');

    }
    public function detail($id){
        $data['konten'] = $this->User_model->detail($id);
        $this->template->load('template_user','user/detail',$data);

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
        <span class="alert-text"> konten berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Konten_model->update_data();
        redirect('user/konten');
    }
    public function add(){
        $this->load->model('Kategori_model');
        $data['list_kategori'] = $this->Kategori_model->getData();
        $this->template->load('template_user','admin/add_konten',$data);
    }
    public function kategori(){
        $this->load->model('Kategori_model');
        $data = array(
            'title' => 'Kategori',
            'list_kategori' => $this->User_model->my_kategori(),
            'all_kategori' => $this->Kategori_model->getData()
        );
        $this->template->load('template_user','user/kategori',$data);
        
    }
    public function simpan_kategori()
    {
        $this->load->model('Kategori_model');
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
         redirect('user/kategori');
        }
        $this->Kategori_model->simpan();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> Kategori Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('user/kategori');
    }
    public function delete_kategori($id){
        $this->load->model('Kategori_model');
        $where = array('id_kategori' => $id);
        $this->db->delete('kategori',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text">Berhasil menghapus Kategori</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('user/kategori');

    }
    public function update_kategori(){
        $this->load->model('Kategori_model');
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Warning!</strong> user berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->kategori_model->update_data();
        redirect('user/kategori');
    }
}
?>