<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('page-login');
	}

	public function aksi_login(){
			// $username = $this->input->post('username');
			// $password = $this->input->post('password');
			// $where = array(
			// 	'username' => $username,
			// 	'password' => md5($password)
			// 	);
			// $cek = $this->m_login->cek_login("admin",$where)->num_rows();
			// if($cek > 0){
			//
			// 	$data_session = array(
			// 		'nama' => $username,
			// 		'status' => "login"
			// 		);
			//
			// 	$this->session->set_userdata($data_session);

			// redirect(base_url("Admin_Dashboard"));

		// }else{
		// 	echo "Username dan password salah !";
		// }
		redirect('lihatPo', 'refresh');
	}

}
