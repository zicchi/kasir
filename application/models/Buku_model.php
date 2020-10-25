<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function get_buku(){
		return $this->db->join('kategori','kategori.id_kat = buku.id_kat')
						->get('buku')
						->result();
	}

	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
	}

	public function get_data_buku_by_id($id)
	{
		return $this->db->where('id_buku', $id)
						->get('buku')
						->row();
	}

	public function tambah($foto)
	{
		$data = array(
				'kode_buku' 	=> $this->input->post('kode_buku'),
				'judul' 		=> $this->input->post('judul'),
				'tahun'			=> $this->input->post('tahun'),
				'penulis'		=> $this->input->post('penulis'),
				'penerbit'		=> $this->input->post('penerbit'),
				'id_kat'		=> $this->input->post('kategori'),
				'stok'			=> $this->input->post('stok'),
				'harga'			=> $this->input->post('harga'),
				'foto'			=> $foto['file_name']
			);

		$this->db->insert('buku', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'kode_buku' 	=> $this->input->post('ubah_kode_buku'),
				'judul' 		=> $this->input->post('ubah_judul'),
				'tahun'			=> $this->input->post('ubah_tahun'),
				'penulis'		=> $this->input->post('ubah_penulis'),
				'penerbit'		=> $this->input->post('ubah_penerbit'),
				'id_kat'		=> $this->input->post('ubah_kategori'),
				'stok'			=> $this->input->post('ubah_stok'),
				'harga'			=> $this->input->post('ubah_harga')
			);

		$this->db->where('id_buku', $this->input->post('ubah_id_buku'))
				 ->update('buku', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_buku', $this->input->post('hapus_id_buku'))
				 ->delete('buku');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */