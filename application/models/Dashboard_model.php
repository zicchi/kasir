<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_jml_buku(){
		return $this->db->select('count(*) as jml_buku')
					    ->get('buku')
					    ->row();
	}

	public function get_jml_transaksi(){
		return $this->db->select('count(*) as jml_transaksi')
					    ->get('transaksi')
					    ->row();
	}

	public function get_jml_pengguna(){
		return $this->db->select('count(*) as jml_pengguna')
					    ->get('user')
					    ->row();
	}

}

/* End of file Kasir_model.php */
/* Location: ./application/models/Kasir_model.php */