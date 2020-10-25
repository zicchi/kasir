<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function get_pengguna(){
		return $this->db->get('user')
						->result();
	}

	public function get_data_pengguna_by_id($id)
	{
		return $this->db->where('id', $id)
						->get('user')
						->row();
	}

	public function tambah()
	{
		$data = array(
				'nama' 		=> $this->input->post('nama'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password'),
				'level'		=> $this->input->post('level')
			);

		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'nama' 		=> $this->input->post('ubah_nama'),
				'username'	=> $this->input->post('ubah_username'),
				'password'	=> $this->input->post('ubah_password'),
				'level'		=> $this->input->post('ubah_level')
			);

		$this->db->where('id', $this->input->post('ubah_id'))
				 ->update('user', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id', $this->input->post('hapus_id'))
				 ->delete('user');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */