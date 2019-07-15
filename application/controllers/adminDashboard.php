<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

	public function __construct(){
     parent::__construct();

     // Load model
     $this->load->model('tenggattable');
  }

	public function index()
	{
		// $data['content'] = $this->db->get('karyawan');
	  $data['content'] = $this->tenggattable->getTenggattable();
		$this->load->view('index', $data);
	}
}
