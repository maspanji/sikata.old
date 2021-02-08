<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keuangan extends CI_Model {

	public function register()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		return $this->db->insert('user_keuangan', $data);
	}

	public function delete($id_keuangan)
	{
		$this->db->where('id_keuangan', $id_keuangan);
		return $this->db->delete('user_keuangan');
	}

	public function get()
	{
		return $this->db->get('user_keuangan')->result_array();
	}

	public function get_id($id_keuangan)
	{
		$this->db->where('id_keuangan', $id_keuangan);
		return $this->db->get('user_keuangan')->row_array();

	}

	public function update($id_keuangan)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->db->where('id_keuangan',$id_keuangan);
		return $this->db->update('user_keuangan',$data);
	}

	public function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

}