<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('template/header_kap');
		$data['registrasi'] = $this->Model_mhs->get_prodi('Telah disetujui oleh keuangan',$this->session->userdata('nama_prodi'));
		$data['registrasi_ta'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh keuangan',$this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/tabel', $data);
		$this->load->view('template/footer');
	}

	public function index_pkl()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('template/header_kap');
		$data['registrasi'] = $this->Model_mhs->get_prodi('Telah disetujui oleh keuangan',$this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/tabel_pkl', $data);
		$this->load->view('template/footer');
	}

	public function index_ta()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('template/header_kap');
		$data['registrasi_ta'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh keuangan',$this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/tabel_ta', $data);
		$this->load->view('template/footer');
	}

	//ganti status (acc kaprodi)
	public function verif_kap()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		if ($this->input->post('nama_dosbim1') == 'default') {
			$this->session->set_flashdata('pilih_dosbim1', 'Dosen Pembimbing Belum Terpilih!');
			redirect('kaprodi');
		}

		$this->Model_mhs->verif_kap();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('kaprodi/pkl');
	}

	public function verif_kap_ta()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		if ($this->input->post('nama_dosbim1') == 'default') {
			$this->session->set_flashdata('pilih_dosbimTA1', 'Dosen Pembimbing 1 Belum Terpilih!');
			redirect('kaprodi/ta');
		}

		if ($this->input->post('nama_dosbim2') == 'default') {
			$this->session->set_flashdata('pilih_dosbimTA2', 'Dosen Pembimbing 2 Belum Terpilih!');
			redirect('kaprodi/ta');
		}

		$this->Model_mhs->verif_kap_ta();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('kaprodi/ta');
	}

	public function batal_kap()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->Model_mhs->batal($this->input->post('id_registrasi'));
		redirect('kaprodi/pkl','refresh');
	}

	public function batal_kap_ta()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->Model_mhs->batal_ta($this->input->post('id_registrasi'));
		redirect('kaprodi/ta','refresh');
	}

	public function rekap_kap()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('template/header_kap');
		$data['registrasi_b'] = $this->Model_mhs->get_prodi('Telah disetujui oleh Kaprodi', $this->session->userdata('nama_prodi'));
		$data['registrasi_c'] = $this->Model_mhs->get_prodi('Telah disetujui oleh Dekan. Surat dapat dicetak', $this->session->userdata('nama_prodi'));
		$data['registrasi_d'] = $this->Model_mhs->get_prodi('Dibatalkan', $this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/rekap_pkl', $data);
		$this->load->view('template/footer');
	}

	public function rekap_ta_kap()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('template/header_kap');
		$data['registrasi_b'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh Kaprodi', $this->session->userdata('nama_prodi'));
		$data['registrasi_c'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh Dekan. Surat dapat dicetak', $this->session->userdata('nama_prodi'));
		$data['registrasi_d'] = $this->Model_mhs->get_prodi_ta('Dibatalkan', $this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/rekap_ta', $data);
		$this->load->view('template/footer');
	}

	public function cetak_ta()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$data['registrasi_b'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh Kaprodi', $this->session->userdata('nama_prodi'));
		$data['registrasi_c'] = $this->Model_mhs->get_prodi_ta('Telah disetujui oleh Dekan. Surat dapat dicetak', $this->session->userdata('nama_prodi'));
		$data['registrasi_d'] = $this->Model_mhs->get_prodi_ta('Dibatalkan', $this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/cetak_ta', $data);
		$this->load->view('template/footer');
	}

	public function cetak_pkl()
	{
		if($this->session->userdata('status') !== 'kaprodi'){
			redirect('kaprodi/login');
		}

		$data['registrasi_b'] = $this->Model_mhs->get_prodi('Telah disetujui oleh Kaprodi', $this->session->userdata('nama_prodi'));
		$data['registrasi_c'] = $this->Model_mhs->get_prodi('Telah disetujui oleh Dekan. Surat dapat dicetak', $this->session->userdata('nama_prodi'));
		$data['registrasi_d'] = $this->Model_mhs->get_prodi('Dibatalkan', $this->session->userdata('nama_prodi'));
		$this->load->view('kaprodi/cetak_pkl', $data);
		$this->load->view('template/footer');
	}

	public function login()
	{
		if($this->session->userdata('status') == 'kaprodi'){
			redirect('kaprodi/login');
		}

		$this->load->view('kaprodi/login');
	}

	public function action_login()
	{
		if($this->session->userdata('status') == 'kaprodi'){
			redirect('kaprodi');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->Model_kaprodi->cek_login('user_kaprodi',$where)->num_rows();
		if($cek > 0){
			$kaprodi = $this->Model_kaprodi->cek_login('user_kaprodi',$where)->row_array();
			$data_session = array(
				'username' => $username,
				'status' => "kaprodi",
				'nama_prodi' => $kaprodi['nama_prodi']
			);
			$this->session->set_userdata($data_session);
			redirect('kaprodi');
		} else{
			$this->session->set_flashdata('login_failed', 'Username / Password Anda Salah!');
			redirect('kaprodi/login');
		}
	}

	public function register()
	{
		$data['prodi'] = $this->Model_prodi->get_prodi();
		$this->load->view('kaprodi/register',$data);
	}

	public function register_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$check = $this->db->get('user_kaprodi');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect('kaprodi/register');
		}
		if ($this->input->post('nama_prodi') == 'default') {
			$this->session->set_flashdata('pilih_prodi', 'Program Studi Belum Terpilih!');
			redirect('kaprodi/register');
		}

		$this->Model_kaprodi->register();
		redirect('admin/kaprodi');
	}

	public function delete($id_kaprodi)
	{
		$this->Model_kaprodi->delete($id_kaprodi);
		redirect('admin/kaprodi');
	}

	public function index_acc()
	{
		$data['account'] = $this->Model_kaprodi->get();
		$this->load->view('kaprodi/index_acc',$data);
	}

	public function edit($id_kaprodi)
	{
		$data['account'] = $this->Model_kaprodi->get_id($id_kaprodi);
		$this->load->view('kaprodi/edit_acc',$data);
	}

	public function edit_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('id_kaprodi !=',$this->input->post('id_kaprodi'));
		$check = $this->db->get('user_kaprodi');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect("kaprodi/edit/".$this->input->post('id_kaprodi'));
		}

		$this->Model_kaprodi->update($this->input->post('id_kaprodi'));
		redirect('admin/kaprodi');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('kaprodi/login');
	}
	
}