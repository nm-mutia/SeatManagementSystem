<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct(){
		 parent::__construct();

		 // Load model
		 $this->load->model('Aset_model');
	}
	public function setTitle(){
		$title = "Aset yang tersedia";
		return $title;
	}

	public function setKategori(){
		$kategori = "Aset";
		return $kategori;
	}

	public function index()
	{
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['content'] = $this->Aset_model->getAsetTersedia();
		$this->load->view('tablePage', $data);
	}

	public function add()
	{
		// $this->load->view('');
	}
}
