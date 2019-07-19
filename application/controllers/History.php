<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('historyModel');
		 $this->load->model('karyawanModel');
		 $this->load->model('Aset_model');
	}

	public function setTitle(){
		$title = "History";
		return $title;
	}

	public function setKategori(int $nomer){
		if ($nomer == 1){
				$kategori = "History Aset";
		}else if ($nomer == 2){
				$kategori = "History Karyawan";
		}else if($nomer == 3){
				$kategori = "History";
		}
		return $kategori;
	}

	public function setSubKategori(){
		$subKategori = "detail";
		return $subKategori;
	}


//karyawan
	public function karyawan(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(2);
		$data['content'] = $this->karyawanModel->getKaryawan();
		$this->load->view('tablePage', $data);
	}

	public function detKaryawan($nik){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] =  $this->setKategori(2);
		$data['subkategori'] = $this->setSubKategori();;
		$nik = base64_decode($nik);
		$nik = $this->encryption->decrypt($nik);
		$data['content'] = $this->historyModel->getHistoryKaryawan($nik);
    	$this->load->view('tableDetailPage', $data);
	}

//aset
	public function aset(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] =  $this->setKategori(1);
		$data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}

	public function detAset($sn){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] =  $this->setKategori(1);
		$data['subkategori'] = $this->setSubKategori();
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$data['content'] = $this->historyModel->getHistoryAset($sn);
    	$this->load->view('tableDetailPage', $data);
	}


//menu history

	public function getAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] =  $this->setKategori(3);
		$data['content'] = $this->historyModel->getAll();
		$this->load->view('tablePage', $data);
	}

	public function detail($sn){ //masih ngarang
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(3);
		$data['subkategori'] = $this->setSubKategori();
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$data['content'] = $this->historyModel->getHistoryAset($sn);
    $this->load->view('tableDetailPage', $data);
	}


//form
	// public function setAll(){
	// 	$data['page_title'] = $this->setTitle();
	// 	$data['kategori'] = "History";
	// 	$data['content'] = $this->historyModel->getAllForm();
	// 	$this->load->view('addFormPage', $data);
	// }

	public function setDetail(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(3);
		$data['content'] = $this->historyModel->getAllForm();
		$this->load->view('addFormPage', $data);
	}

	public function setDetailHistory(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(3);
		$data['content'] = $this->historyModel->getAllFormDetail();
		$this->load->view('addFormPage', $data);
	}

}
