<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('Po_model');
	}

	public function setTitle(){
		$title = "Purchase Order";
		return $title;
	}

	public function setKategori(){
		$kategori = "Aset";
		return $kategori;
	}

	public function index(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['content'] = $this->Po_model->getPo();
		$this->load->view('tablePage', $data);
	}

}
