<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'kategori_view';
			$data['kategori'] = $this->kategori_model->get_kategori();
			$this->load->view('template', $data);

		} else { 
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->kategori_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah kategori berhasil');
					redirect('kategori/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah kategori gagal');
					redirect('kategori/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('kategori/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_nama', 'Nama Kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->kategori_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah kategori berhasil');
					redirect('kategori/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah kategori gagal');
					redirect('kategori/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('kategori/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->kategori_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus kategori berhasil');
				redirect('kategori/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus kategori gagal');
				redirect('kategori/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_kategori_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->kategori_model->get_data_kategori_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */