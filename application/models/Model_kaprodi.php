<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kaprodi extends CI_Model {

	public function register()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama_prodi' => $this->input->post('nama_prodi')
		);
		return $this->db->insert('user_kaprodi', $data);
	}

	public function delete($id_kaprodi)
	{
		$this->db->where('id_kaprodi', $id_kaprodi);
		return $this->db->delete('user_kaprodi');
	}

	public function get()
	{
		return $this->db->get('user_kaprodi')->result_array();
	}

	public function get_id($id_kaprodi)
	{
		$this->db->where('id_kaprodi', $id_kaprodi);
		return $this->db->get('user_kaprodi')->row_array();

	}

	public function update($id_kaprodi)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama_kaprodi' => $this->input->post('nama_kaprodi')
		);

		$this->db->where('id_kaprodi',$id_kaprodi);
		return $this->db->update('user_kaprodi',$data);
	}

	public function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

}