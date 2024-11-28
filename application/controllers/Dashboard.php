<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect('LoginDashboard');
        }
    }

    public function navbar(){
        $role = $this->session->userdata('role');
        if($role==1){
            $this->load->view('Dashboard/navbar1');
        }else{
            $this->load->view('Dashboard/navbar');
        }
    }

    public function index(){
        $role = $this->session->userdata('role');
        $this->load->model('M_user');
        $where = array(
            'id' => $this->session->userdata('id'), 
        );
        $user = $this->M_user->get_user($where, 'admin')->row_array();
        if($user['status']=='baru'){
            $id = $this->session->userdata('id');
            $this->View_EditPassword($id);
        }else{ 
            $data['title'] = 'Home Dashboard';
            $this->load->model('M_KotaKabupaten');
            //ambil keyword 
            if($this->input->post('submit')){
                $data['keyword']= $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            }else{
                $data['keyword'] = $this->session->userdata('keyword');
            }

            //PAGINATION 
            $this->load->library('pagination');
            $config['base_url'] = base_url('index.php/Dashboard/index/');
            $this->db->like('KotaKabupaten', $data['keyword']);
            $this->db->from('kota_kabupaten');
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 6;
            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(3);
            $data['row'] = $this->M_KotaKabupaten->tampil_Kokab_limit($config['per_page'], $data['start'], $data["keyword"]);
            $this->load->view('Dashboard/Header', $data);
            $this->navbar();
            if($role==1){
                $this->load->view('Dashboard/Home', $data);
            }else{
                $this->load->view('Dashboard/Home2', $data);
            }
        }
    }


    public function View_EditPassword($id){
        $data['title'] = 'Ganti Password';
        $data['id'] = $id;
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/User/View_EditPassword', $data);
    }

    public function TambahKotaKabupaten(){
        $data['title'] = 'Tambah Kota/Kabupaten';
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/View_TambahKotaKabupaten');
    }

    public function ActionTambahKotaKabupaten(){
        $nama = $this->input->post( 'nama', true );
        $url = $this->input->post('urlkokab', true);

        //rule Validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urlkokab', 'Urlkokab', 'required');

        if($this->form_validation->run() != FALSE){
            $data = array(
                'KotaKabupaten' => $nama,	
                'urlkokab' => $url,
            );
            $this->load->model('M_KotaKabupaten');
            $this->M_KotaKabupaten->tambah_Kokab($data,'kota_kabupaten');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('index.php/Dashboard'));
        }else{
            $data['title'] = 'Tambah Kota/Kabupaten';
            $this->load->view('Dashboard/Header', $data);
            $this->navbar();
            $this->load->view('Dashboard/View_TambahKotaKabupaten');
        }
    }

    public function EditKotaKabupaten($id){
        $data['title'] = 'Edit Kota/Kabupaten';
        $where = array('ID'=> $id);
        $this->load->model('M_KotaKabupaten');
		$data['kokab'] = $this->M_KotaKabupaten->get_Kokab($where, 'kota_kabupaten')->result();
		$this->load->view('Dashboard/Header',$data);
        $this->navbar();
        $this->load->view('Dashboard/View_EditKotaKabupaten', $data);
    }
    public function UpdateKotaKabupaten(){
        $ID = $this->input->post('ID', true);
        $KK = $this->input->post('nama', true);
        $url = $this->input->post('urlkokab', true);

        //rule Validasi 
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urlkokab', 'Urlkokab', 'required');

        if($this->form_validation->run() != FALSE){
            $data = array(
                'KotaKabupaten' => $KK, 
                'urlkokab' => $url,
            );
            $where = array(
                'ID' => $ID,
            );
            $this->load->model('M_KotaKabupaten');
            $this->M_KotaKabupaten->update_Kokab($where, $data , 'kota_kabupaten ');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('index.php/Dashboard'));
        }else{
            $this->EditKotaKabupaten($ID);
        }
    }
    public function DeleteKotaKabupaten($id){
        $data['title'] = 'Delete Kota/Kabupaten';
        $where = array('ID'=> $id);
		$data['kokab'] = $this->M_KotaKabupaten->get_Kokab($where, 'kota_kabupaten')->result();
        $this->load->model('M_KotaKabupaten');
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/View_DeleteKotaKabupaten', $data);
    }
    public function ActionDeleteKotaKabupaten(){
        $ID = $this->input->get('ID');

        $where = array(
            'ID' => $ID,
        );

        $this->load->model('M_KotaKabupaten');
        $this->M_KotaKabupaten->delete_Kokab($where,'kota_kabupaten ');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('index.php/Dashboard'));
    }

    //(tabel konten)
    public function pengaturanKonten($id){
        $data['title'] = 'Pengaturan Konten Kota/Kabupaten';
        $where = array('ID'=> $id);
        $this->load->model('M_Konten');
        $data['konten'] = $this->M_Konten->tampil_konten($where);
		$data['kokab'] = $this->M_KotaKabupaten->get_Kokab($where, 'kota_kabupaten')->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/pengaturanKonten', $data);
    }

    public function tambahKonten($id){
        $data['title'] = 'Tambah Konten';
        $where = array('ID'=> $id);
        $this->load->model('M_KotaKabupaten');
		$data['kokab'] = $this->M_KotaKabupaten->get_Kokab($where, 'kota_kabupaten')->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/Konten/View_TambahKonten', $data);
    }
    public function ActionTambahKonten(){
        $konten = $this->input->post('konten', true);
        $ID = $this->input->post('ID', true);
        $isi = $this->input->post('isi_konten', true);

        //rule Validasi 
        $this->form_validation->set_rules('konten', 'Judul Koten', 'required');
        $this->form_validation->set_rules('isi_konten', 'Isi Konten', 'required');

        if($this->form_validation->run() != FALSE){
            $data = array(
                'konten' => $konten,
                'ID' => $ID,		
                'isi_konten' => $isi,
            );
            $this->load->model('M_Konten');
            $this->M_Konten->tambah_Konten($data,'konten');
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect(base_url('index.php/Dashboard/pengaturanKonten/'.$ID));
        }else{
            $this->tambahKonten($ID);
        }
    }
    public function EditKonten($id){
        $data['title'] = 'Edit Konten';
        $where = array('id_konten'=> $id);
        $this->load->model('M_Konten');
		$data['konten'] = $this->M_Konten->get_Konten($where, 'konten')->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/Konten/View_EditKonten', $data);      
    }
    public function UpdateKonten(){
        $konten = $this->input->get('konten');
        $ik = $this->input->get('id_konten');
        $ID = $this->input->get('ID');
        $isi = $this->input->get('isi_konten');

        $data = array(
            'konten' => $konten, 
            'isi_konten' => $isi,
        );

        $where = array(
            'Id_konten' => $ik,
        );

        $this->load->model('M_Konten');
        $this->M_Konten->update_Konten($where, $data , 'konten');
        $this->session->set_flashdata('flash', 'Diedit');
        redirect(base_url('index.php/Dashboard/pengaturanKonten/'.$ID));
    }
    public function DeleteKonten($id){
        $data['title'] = 'Delete Konten';
        $where = array('Id_konten'=> $id);
        $this->load->model('M_Konten');
		$data['konten'] = $this->M_Konten->get_Konten($where, 'konten')->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/Konten/View_DeleteKonten', $data);
    }
    public function ActionDeleteKonten(){
        $ik = $this->input->get('Id_konten');
        $ID = $this->input->get('ID');

        $where = array(
            'Id_konten' => $ik,
        );

        $this->load->model('M_Konten');
        $this->M_Konten->delete_Koten($where,'konten');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('index.php/Dashboard/pengaturanKonten/'.$ID));
    }

    //UserManagement
    public function userManagement(){
        $data['title'] = 'User Management';
        $where = array(
            'role' => 2, 
        );
        $data['users'] = $this->M_user->get_Users($where);
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/User/View_UserManagement', $data);
    }

    public function generate_Username() {
        $input = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < 9; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public function add_user(){
        $data = array(
            'username' => $this->generate_Username(),
            'password' => md5('1234'),
            'role' => 2, 
            'status' => 'baru',
        );
            $this->load->model('M_user');
            $this->M_user->tambah_User($data,'admin');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('index.php/Dashboard/userManagement'));
    }

    public function UpdatePassword(){
        $p1 = $this->input->POST('Password1', true);
        $p2 = $this->input->POST('Password2', true);

        //rule Validasi 
        $this->form_validation->set_rules('Password1', 'password baru', 'required');
        $this->form_validation->set_rules('Password2', 'password baru', 'required');

        $ID = $this->session->userdata('id');

        if($this->form_validation->run() != FALSE){
            if($p1==$p2){
                $status = 'lama'; 
                $data = array(
                    'password' => md5($p1), 
                    'status' => $status,
                );
                $where = array(
                    'id' => $ID,
                );
                $this->load->model('M_user');
                $this->M_user->update_Password($where, $data , 'admin');
                redirect(base_url('index.php/Dashboard'));
            }else{
                // var_dump($gagal);      
                $this->session->set_flashdata('gantipas', 'kedua Password tidak cocok');
                $this->View_EditPassword($ID);
            }
        }else{
            $this->View_EditPassword($ID);
        }
    }
    
    public function KonfirmasiDeleteUser($id){
        $data['title'] = 'Delete User';
        $where = array('id'=> $id);
        $this->load->model('M_user');
		$data['user'] = $this->M_user->get_user($where, 'admin')->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
        $this->load->view('Dashboard/User/View_DeleteUser', $data);
    }


    public function DeleteUser($id){
        $where = array(
            'id' => $id,
        );
        $user = $this->M_user->get_user($where, 'admin')->row_array();
        $this->load->model('M_user');
        $this->M_user->delete_User($where,'admin');
        $this->session->set_flashdata('flash1', 'Admin '.$user['username'].' Berhasil Dihapus');
        redirect(base_url('index.php/Dashboard/userManagement'));
    }

    public function ResetPassword($id){
        $where = array(
            'id' => $id,
        );
        $user = $this->M_user->get_user($where, 'admin')->row_array();
        $data = array( 
            'password' => md5('1234'),
            'status' => 'baru', 
        );
        $this->load->model('M_user');
        $this->M_user->update_Password($where, $data , 'admin');
        $this->session->set_flashdata('flash1', 'Password admin '.$user['username'].' Berhasil Direset');
        redirect(base_url('index.php/Dashboard/userManagement'));
    }


    public function Preview($id){
        $where = array('ID'=> $id);
		$this->load->model('M_KotaKabupaten');
        $data['title'] = 'Preview Konten';
		$data['namaKK'] = $this->M_KotaKabupaten->tampil_nama_KoKab($where)->result();
		$data['row'] = $this->M_KotaKabupaten->tampil_DataKoKab($where)->result();
        $this->load->view('Dashboard/Header', $data);
        $this->navbar();
		$this->load->view('Dashboard/Preview',$data);
    }


    // // Tabel (isi konten)
    // public function PengaturanIsiKonten($id){
    //     $where = array('idKonten'=> $id);
    //     $where2 = array('Id_konten'=> $id);
    //     $this->load->model('M_Konten');
    //     $this->load->model('M_IsiKonten');
    //     $data['isikonten'] = $this->M_IsiKonten->tampil_isikonten($where);
	// 	$data['konten'] = $this->M_Konten->get_Konten($where2, 'konten')->result();
    //     $this->load->view('Dashboard/pengaturanIsiKonten', $data);
    // }

    // public function tambahIsiKonten($id){
    //     $where = array('Id_konten'=> $id);
    //     $this->load->model('M_Konten');
	// 	$data['konten'] = $this->M_Konten->get_Konten($where, 'konten')->result();
    //     $this->load->view('Dashboard/IsiKonten/View_TambahIsiKonten', $data);
    // }

    // public function ActionTambahIsiKonten(){
    //     $judul = $this->input->post('judul');
    //     $textContent = $this->input->post('textContent');
    //     $idKonten = $this->input->post('idKonten');

    //     $data = array(
    //         'judul' => $judul,
    //         'textContent' => $textContent,
    //         'idKonten' => $idKonten,		
    //     );
    //     $this->load->model('M_IsiKonten');
    //     $this->M_IsiKonten->tambah_IsiKonten($data,'isi_konten');
    //     redirect(base_url('index.php/Dashboard/pengaturanIsiKonten/'.$idKonten));
    // }
    // public function EditIsiKonten($id){
    //     $where = array(
    //         'Id_isi_konten' => $id,
    //     );
    //     $this->load->model('M_IsiKonten');
	// 	$data['isikonten'] = $this->M_IsiKonten->get_IsiKonten($where, 'isi_konten')->result();
    //     $this->load->view('Dashboard/IsiKonten/View_EditIsiKonten', $data);
    // }
    // public function UpdateIsiKonten(){
    //     $judul = $this->input->post('judul');
    //     $isi = $this->input->post('textContent');
    //     $iik = $this->input->post('Id_isi_konten');
    //     $ik = $this->input->post('idKonten');

    //     $data = array(
    //         'judul' => $judul,
    //         'textContent' => $isi, 
    //     );

    //     $where = array(
    //         'Id_isi_konten' => $iik,
    //     );

    //     $this->load->model('M_IsiKonten');
    //     $this->M_IsiKonten->update_IsiKonten($where, $data , 'isi_konten');
    //     redirect(base_url('index.php/Dashboard/pengaturanIsiKonten/'.$ik));
    // }

    // public function DeleteIsiKonten($id){
    //     $where = array(
    //         'Id_isi_konten' => $id,
    //     );

    //     $this->load->model("M_IsiKonten");
	// 	$data['isikonten'] = $this->M_IsiKonten->get_IsiKonten($where, 'isi_konten')->result();
    //     $this->load->view('Dashboard/IsiKonten/View_DeleteIsiKonten', $data);
    // }
    // public function ActionDeleteIsiKonten(){
    //     $iik = $this->input->post('Id_isi_konten');
    //     $ik = $this->input->post('idKonten');

    //     $where = array(
    //         'Id_isi_konten' => $iik,
    //     );

    //     $this->load->model('M_IsiKonten');
    //     $this->M_IsiKonten->delete_isiKonten($where,'isi_konten');
    //     redirect(base_url('index.php/Dashboard/pengaturanIsiKonten/'.$ik));
    // }
}

?>