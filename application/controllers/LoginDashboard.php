<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginDashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_login');
    }

	public function index()
	{
		$this->load->view('Dashboard/LoginPage');
	}

    public function login_aksi(){
        $user = $this->input->post('username',true);
        $pass = md5($this->input->post('password', true));

        //rule Validasi 
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() != FALSE){
            $where = array(
                'username' => $user, 
                'password' => $pass, 
            );
            $cekLogin = $this->m_login->cek_login($where)->num_rows();

            if($cekLogin > 0 ){
                $logininfo=$this->m_login->cek_login($where)->row_array();
                $sess_data = array(
                    'username' => $logininfo['username'], 
                    'login' => 'OK',    
                    'keyword' => '',
                    'id' => $logininfo['id'],
                    'role' => $logininfo['role'],
                );
                $this->session->set_userdata($sess_data);
                redirect(base_url('index.php/Dashboard'));
                // var_dump($logininfo['role']);
            }else{
                $this->session->set_flashdata('errorlogin', 'Username atau Password salah!');
                $this->load->view('Dashboard/LoginPage');
        }
        }else{
            $this->load->view('Dashboard/LoginPage');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('index.php/LoginDashboard'));
    }
}

?>