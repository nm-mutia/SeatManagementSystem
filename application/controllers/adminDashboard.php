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

	public function detail($id, $sn)
	{
		$data['page_title'] = "Detail";
		$data['kategori'] = "Tenggat";
	  	$data['content'] = $this->historyModel->getTenggatdetail($id, $sn);

		$this->load->view('detailPage', $data);

		// redirect('admin','refresh');
	}

}
