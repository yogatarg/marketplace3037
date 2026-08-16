<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Artikel extends CI_Controller {
 
 	function __construct()
	{
		parent::__construct();
		
		//jika tidak ada tiket login maka suruh login
		if(!$this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
			redirect('/', 'refresh');
		}
	}

 	// function index()
 	// {
 	// 	$this->load->model("Martikel"); 
	// 	$data['artikel'] = $this->Martikel->tampil();

	// 	$this->load->view('header');
	// 	$this->load->view('artikel_tampil', $data);
	// 	$this->load->view('footer');
 	// }

 	function tampil($id_artikel)
 	{
 		$this->load->model('Martikel');
		$data["artikel"] = $this->Martikel->tampilan($id_artikel);

		$this->load->view('header');
		$this->load->view('artikel_tampil', $data);
		$this->load->view('footer');
 	}
 
 }
 
 /* End of file Artikel.php */
 /* Location: ./application/controllers/Artikel.php */ ?>