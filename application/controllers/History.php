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

	public function karyawan(){
		$data['page_title'] = "History Karyawan";
		$data['kategori'] = $this->setTitle();
		$data['content'] = $this->karyawanModel->getKaryawan();
		$this->load->view('tablePage', $data);
	}

	public function aset(){
		$data['page_title'] = "History Aset";
		$data['kategori'] = $this->setTitle();
		$data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}

	public function detAset($sn){
		$data['page_title'] = "History Aset";
		$data['kategori'] = $this->setTitle();
		$data['subkategori'] = "detail";
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$data['content'] = $this->historyModel->getHistoryAset($sn);
    	$this->load->view('tableDetailPage', $data);
	}

	public function detKaryawan($nik){
		$data['page_title'] = "History Karyawan";
		$data['kategori'] = $this->setTitle();
		$data['subkategori'] = "detail";
		$nik = base64_decode($nik);
		$nik = $this->encryption->decrypt($nik);		
		$data['content'] = $this->historyModel->getHistoryKaryawan($nik);
    	$this->load->view('tableDetailPage', $data);
	}

	public function getAll(){
		$data['page_title'] = "History";
		$data['kategori'] = $this->setTitle();
		$data['content'] = $this->historyModel->getAll();
		$this->load->view('tablePage', $data);
	}

	public function setAll(){
		$data['page_title'] = "History";
		$data['kategori'] = $this->setTitle();
		$this->load->view('addFormPage', $data);
	}

}
