<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'pengguna_view';
			$data['pengguna'] = $this->pengguna_model->get_pengguna();
			$this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('level', 'level', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->pengguna_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah pengguna berhasil');
					redirect('pengguna/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah pengguna gagal');
					redirect('pengguna/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('pengguna/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('ubah_username', 'username', 'trim|required');
			$this->form_validation->set_rules('ubah_password', 'password', 'trim|required');
			$this->form_validation->set_rules('ubah_level', 'level', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->pengguna_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah pengguna berhasil');
					redirect('pengguna/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah pengguna gagal');
					redirect('pengguna/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('pengguna/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->pengguna_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus pengguna Berhasil');
				redirect('pengguna/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus pengguna gagal');
				redirect('pengguna/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_pengguna_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->pengguna_model->get_data_pengguna_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */