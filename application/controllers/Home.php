<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('pages/home');
	}

	public function get_nim()
	{
		$nim_mhs = $this->input->post('nim_mhs');
		$data['registrasi'] = $this->Model_mhs->get_nim($this->input->post('nim_mhs'));
		$data['registrasi_ta'] = $this->Model_mhs->get_nim_ta($this->input->post('nim_mhs'));
		$this->load->view('pages/status_mhs', $data);
	}

	public function surat($id_registrasi)
	{
		$data['registrasi'] = $this->db->get_where('registrasi',['id_registrasi' => $id_registrasi])->row_array();
		$this->load->view('pages/sk_pkl',$data);
	}

	public function surat_ta($id_registrasi)
	{
		$data['registrasi_ta'] = $this->db->get_where('registrasi_ta',['id_registrasi' => $id_registrasi])->row_array();
		$this->load->view('pages/sk_ta',$data);
	}
}
?>