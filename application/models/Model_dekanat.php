<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dekanat extends CI_Model {

	public function register()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		return $this->db->insert('user_dekanat', $data);
	}

	public function delete($id_dekanat)
	{
		$this->db->where('id_dekanat', $id_dekanat);
		return $this->db->delete('user_dekanat');
	}

	public function get()
	{
		return $this->db->get('user_dekanat')->result_array();
	}

	public function get_id($id_dekanat)
	{
		$this->db->where('id_dekanat', $id_dekanat);
		return $this->db->get('user_dekanat')->row_array();

	}

	public function update($id_dekanat)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->db->where('id_dekanat',$id_dekanat);
		return $this->db->update('user_dekanat',$data);
	}

	public function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

}