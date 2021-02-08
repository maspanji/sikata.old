<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_prodi extends CI_Model{

	public function get_prodi(){

		return $this->db->get('prodi')->result_array();
	}

}