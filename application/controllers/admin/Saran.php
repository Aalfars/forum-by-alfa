<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Saran extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');

        $this->load->model('Admin_model');
        if ( $this->session->userdata('level') == 'Admin') {;
        } else{;
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Login dulu bosku</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span aria-hidden="true">&times</span>
            </button>
        </div>
            ');
            redirect('Auth');  
            
        };
    }
    public function index(){
        $data['title'] = 'Saran';
        $data['saran'] = $this->Admin_model->get_saran();
        $this->template->load('template_admin','admin/saran',$data);
    }
    public function delete_saran($id){
        $this->Admin_model->delete_saran($id);
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Warning!</strong> Berhasil menghapus Saran</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/saran');
        
}
public function hapus_semua(){
    $this->db->empty_table('saran');
    $this->session->set_flashdata('alert','
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-text"><strong>Warning!</strong> Berhasil menghapus Semua Saran</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    ');
    redirect('admin/saran');
}
}
?>