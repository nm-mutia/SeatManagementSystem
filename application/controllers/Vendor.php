<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('vendor_model');
	}

	public function setTitle(){
		$title = "Vendor";
		return $title;
	}

	public function setKategori(){
		$kategori = "Vendor";
		return $kategori;
	}

	public function index(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['content'] = $this->vendor_model->getVendor();
		$this->load->view('tablePage', $data);
	}

	public function list($nama){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['subkategori'] = $nama;
		$data['content'] = $this->vendor_model->getList($nama);
		$this->load->view('tableDetailPage', $data);
	}

}
