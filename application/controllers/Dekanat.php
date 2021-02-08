<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dekanat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->load->view('template/header_dek');
		$data['registrasi'] = $this->Model_mhs->get_status('Telah disetujui oleh Kaprodi');
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('Telah disetujui oleh Kaprodi');
		$this->load->view('dekanat/tabel', $data);
		$this->load->view('template/footer');
	}

	public function index_pkl()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->load->view('template/header_dek');
		$data['registrasi'] = $this->Model_mhs->get_status('Telah disetujui oleh Kaprodi');
		$this->load->view('dekanat/tabel_pkl', $data);
		$this->load->view('template/footer');
	}

	public function index_ta()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->load->view('template/header_dek');
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('Telah disetujui oleh Kaprodi');
		$this->load->view('dekanat/tabel_ta', $data);
		$this->load->view('template/footer');
	}

	//ganti status (acc kaprodi)
	public function verif_dek()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->Model_mhs->verif_dek();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('dekanat/pkl');
	}

	public function verif_dek_ta()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->Model_mhs->verif_dek_ta();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('dekanat/ta');
	}

	public function rekap_pkl()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->load->view('template/header_dek');
		$data['registrasi'] = $this->Model_mhs->get_status('Telah disetujui oleh Dekan. Surat dapat dicetak');
		$this->load->view('dekanat/rekap_pkl', $data);
		$this->load->view('template/footer');
	}

	public function rekap_ta()
	{
		if($this->session->userdata('status') !== 'dekanat'){
			redirect('dekanat/login');
		}

		$this->load->view('template/header_dek');
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('Telah disetujui oleh Dekan. Surat dapat dicetak');
		$this->load->view('dekanat/rekap_ta', $data);
		$this->load->view('template/footer');
	}

	public function login()
	{
		if($this->session->userdata('status') == 'dekanat'){
			redirect('dekanat');
		}

		$this->load->view('dekanat/login');
	}

	public function action_login()
	{
		if($this->session->userdata('status') == 'dekanat'){
			redirect('dekanat');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->Model_dekanat->cek_login('user_dekanat',$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => "dekanat"
			);
			$this->session->set_userdata($data_session);
			redirect('dekanat');
		} else{
			$this->session->set_flashdata('login_failed', 'Username / Password Anda Salah!');
			redirect('dekanat/login');
		}
	}

	public function register()
	{
		$this->load->view('dekanat/register');
	}

	public function register_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$check = $this->db->get('user_dekanat');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect('dekanat/register');
		}

		$this->Model_dekanat->register();
		redirect('admin/dekanat');
	}

	public function delete($id_dekanat)
	{
		$this->Model_dekanat->delete($id_dekanat);
		redirect('admin/dekanat');
	}

	public function index_acc()
	{
		$data['account'] = $this->Model_dekanat->get();
		$this->load->view('dekanat/index_acc',$data);
	}

	public function edit($id_dekanat)
	{
		$data['account'] = $this->Model_dekanat->get_id($id_dekanat);
		$this->load->view('dekanat/edit_acc',$data);
	}

	public function edit_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('id_dekanat !=',$this->input->post('id_dekanat'));
		$check = $this->db->get('user_dekanat');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect("dekanat/edit/".$this->input->post('id_dekanat'));
		}

		$this->Model_dekanat->update($this->input->post('id_dekanat'));
		redirect('admin/dekanat');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('dekanat/login');
	}
}