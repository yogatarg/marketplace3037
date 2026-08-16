<?php 
class Slider extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		//jika tidak ada tiket login maka suruh login
		if(!$this->session->userdata("id_admin")) {
			redirect('/', 'refresh');
		}
	}


	function index() {

		
		$this->load->model("Mslider");

		$data["slider"] = $this->Mslider->tampil();


		$this->load->view("header");
		$this->load->view("slider_tampil", $data);
		$this->load->view('footer');
	}

	function tambah() {

		//mendapatkan inputan dari formulir pakai $this->input->post
		$inputan = $this->input->post();

		//pasang form_validation
		//form validation Nama slider wajib diisi
		$this->form_validation->set_rules("caption_slider", "caption slider", "required");

		//atur pesan dalam bahasa Indonesia
		$this->form_validation->set_message("required", "%s wajib diisi");

		//jika ada inputan
		if ($this->form_validation->run()== TRUE) {
			//panggil model Mslider
			$this->load->model('Mslider');
			//jalankan fungsi simpan()
			$this->Mslider->simpan($inputan);

			//pesan dilayar
			$this->session->set_flashdata('pesan_sukses', 'Data slider tersimpan');

			//redirecrt ke fitur slider untuk tampil slider
			redirect('slider', 'refresh');
		}

		$this->load->view('header'); 
		$this->load->view('slider_tambah'); 
		$this->load->view('footer');
	}
	function hapus($id_slider){
		$this->load->model('Mslider');
		
		$this->Mslider->hapus($id_slider);

		$this->session->set_flashdata('pesan_sukses', 'Data Berhasil dihapus');
		redirect('slider','refresh');	
	}

	function edit($id_slider){

		//1. Tampilkan slider Lama
		$this->load->model("Mslider");
		$data['slider'] = $this->Mslider->detail($id_slider);

		//2. Baru mikir ubah data
		$inputan = $this->input->post();

		//form validation caption slider wajib diisi
		$this->form_validation->set_rules("caption_slider", "caption slider", "required");

		//atur pesan dalam bahasa Indonesia
		$this->form_validation->set_message("required", "%s wajib diisi");

		//jika ada inputan
		if($this->form_validation->run()==TRUE){
			$this->Mslider->edit($inputan, $id_slider);

			//pesan
			$this->session->set_flashdata('pesan_sukses', 'slider telah diubah');

			//redirect
			redirect('slider', 'refresh');	
		}

		$this->load->view("header");
		$this->load->view("slider_edit", $data);
		$this->load->view("footer");
	}
}
?>