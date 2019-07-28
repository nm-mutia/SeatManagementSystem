<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('lokasiModel');
		$this->load->model('historyModel');
	    $this->load->model('Aset_model');
	}

	public function dashboard(){
		$data['hard'] = $this->Aset_model->countKtg("Hardware");
	  	$data['soft'] = $this->Aset_model->countKtg("Software");
	  	$data['pjm'] = $this->historyModel->countPeminjam();
		$data['content'] = $this->lokasiModel->getLokasi();
		$data['acc'] = $this->lokasiModel;
		$this->load->view('index', $data);
	}


}