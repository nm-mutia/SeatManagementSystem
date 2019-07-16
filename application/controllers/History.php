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
		$data['page_title'] = $this->setTitle();;
		$data['kategori'] = "Karyawan";
		$data['content'] = $this->karyawanModel->getKaryawan();
		$this->load->view('tablePage', $data);
	}

	public function aset(){
		$data['page_title'] = $this->setTitle();;
		$data['kategori'] = "Aset";
		$data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}
}
