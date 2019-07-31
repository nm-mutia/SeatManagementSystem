<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_MainController {

	protected $access = "Staff";

	public function __construct(){
		parent::__construct();
	    $this->load->model('pegawaiModel');
	}

  	public function index(){
		$this->load->view('pegawaiPage');
	}

	public function dashboard($nip){
      	$nip = base64_decode($nip);
		$nip = $this->encryption->decrypt($nip);
		if($nip == $this->session->userdata("NIP")){
	  		$data['hard'] = $this->pegawaiModel->countKtg($nip, 'Hardware');
	  		$data['soft'] = $this->pegawaiModel->countKtg($nip, 'Software');
	  		$data['pgw'] = $this->pegawaiModel->getPegawaiById($nip)->row();
	  		$data['tenggat'] = $this->pegawaiModel->getTenggatPegawai($nip);
	  		$data['aset'] = $this->pegawaiModel->getAsetPegawai($nip);
	  		$data['history'] = $this->pegawaiModel->getHistoryPegawai($nip);
			$this->load->view('pegawaiPage', $data);
		}else{
			die("<h4>Access denied</h4>");
		}
	}

}
