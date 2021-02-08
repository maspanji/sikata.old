<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Model_prodi');
	}

	public function index()
	{
		$data['prodi'] = $this->Model_prodi->get_prodi();
		$this->load->
	}

}

 ?>