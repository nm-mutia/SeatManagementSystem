<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

	public function __construct(){
     parent::__construct();

     // Load model
     $this->load->model('historyModel');
  }

	public function index()
	{
		// $data['content'] = $this->db->get('karyawan');
	  	$data['content'] = $this->historyModel->getTenggattable();
		$this->load->view('index', $data);
	}

	public function update($id = null)
	{
		// $this->db->where('NIK', $id);
		// $this->db->delete('karyawan');
		
		// redirect('adminDashboard', 'refresh');
	}
	
	public function delete($id = null)
	{
		$this->db->where('NIK', $id);
		$this->db->delete('karyawan');
		
		redirect('adminDashboard', 'refresh');
	}
}
