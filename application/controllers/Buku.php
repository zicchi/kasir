<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'buku_view';
			$data['buku'] = $this->buku_model->get_buku();

			//get_kategori untuk dropdown tambah/edit buku
			$data['kategori'] = $this->buku_model->get_kategori();
			$this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
			$this->form_validation->set_rules('tahun', 'tahun', 'trim|required|numeric');
			$this->form_validation->set_rules('penulis', 'penulis', 'trim|required');
			$this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
			$this->form_validation->set_rules('stok', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				//upload file
				$config['upload_path'] = './assets/cover_buku/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2000000';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('foto')){
					if($this->buku_model->tambah($this->upload->data()) == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah buku berhasil');
						redirect('buku/index');
					} else {
						$this->session->set_flashdata('notif', 'Tambah buku gagal');
						redirect('buku/index');
					}
				} else {
					$this->session->set_flashdata('notif', 'Tambah buku gagal upload');
					redirect('buku/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('buku/index');
			}
		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_judul', 'Judul', 'trim|required');
			$this->form_validation->set_rules('ubah_tahun', 'tahun', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_penulis', 'penulis', 'trim|required');
			$this->form_validation->set_rules('ubah_penerbit', 'penerbit', 'trim|required');
			$this->form_validation->set_rules('ubah_stok', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_harga', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_kategori', 'kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->buku_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah buku berhasil');
					redirect('buku/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah buku gagal');
					redirect('buku/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('buku/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->buku_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus buku Berhasil');
				redirect('buku/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus buku gagal');
				redirect('buku/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_buku_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->buku_model->get_data_buku_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */