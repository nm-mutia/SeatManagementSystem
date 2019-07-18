<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porder extends CI_Controller {

	// private $title;
	public function __construct(){
		 parent::__construct();
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

	public function detail($id){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['subkategori'] = "detail";
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['content'] = $this->Po_model->getPoDetail($sid);
    	$this->load->view('tableDetailPage', $data);
	}

	public function setAll(){
		$data['page_title'] = $this->setTitle(); 
		$data['kategori'] = $this->setTitle();
		$this->load->view('addFormPage', $data);
	}


}
