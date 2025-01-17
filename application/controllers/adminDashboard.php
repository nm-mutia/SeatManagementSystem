<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends MY_MainController {
	//INI UDAH GAK DIPAKAI

	// protected $access = "Admin";

	public function __construct(){
	    parent::__construct();

	    // Load model
	    $this->load->model('historyModel');
	    $this->load->model('Aset_model');
  	}

	public function index()
	{
		// $data['content'] = $this->db->get('karyawan');
	  	$data['content'] = $this->historyModel->getTenggattable();
	  	$data['hard'] = $this->Aset_model->countKtg("Hardware");
	  	$data['soft'] = $this->Aset_model->countKtg("Software");
	  	$data['pjm'] = $this->historyModel->countPeminjam();
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
