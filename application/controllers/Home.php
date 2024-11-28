<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function datkotakabuoaten()
	{
		$this->load->model('M_KotaKabupaten');
		$data['row'] = $this->M_KotaKabupaten->tampil_KoKab();
		$this->load->view('Halaman_Utama',$data);
	}
	public function index()
	{
		$this->load->view('Scanner');
	}
	public function toContent($id)
	{
		$where = array('ID'=> $id);
		$this->load->model('M_KotaKabupaten');
		$data['namaKK'] = $this->M_KotaKabupaten->tampil_nama_KoKab($where)->result();
		$data['row'] = $this->M_KotaKabupaten->tampil_DataKoKab($where)->result();
		$this->load->view('DataKoKab',$data);
	}
	public function toSubContent($id)
	{
		$where = array('id_konten'=>$id);
		$this->load->model("M_KotaKabupaten");
		$data['row'] = $this->M_KotaKabupaten->tampil_Sub_Konten($where)->result();
		$this->load->view('SubKonten',$data);
	}
}
