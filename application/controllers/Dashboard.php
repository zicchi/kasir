<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'dashboard_view';
			$data['jml_buku'] = $this->dashboard_model->get_jml_buku();
			$data['jml_transaksi'] = $this->dashboard_model->get_jml_transaksi();
			$data['jml_pengguna'] = $this->dashboard_model->get_jml_pengguna();
			$this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */