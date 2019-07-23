<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porder extends CI_Controller {

	// private $title;
	public function __construct(){
		 parent::__construct();
		 $this->load->model('Po_model');
		 $this->load->model('Aset_model');
	}

	public function setTitle(){
		$title = "Aset";
		return $title;
	}

	public function setKategori(int $nomer){
		if ($nomer == 1){
				$kategori = "Purchase Order";
		}else if ($nomer == 2){
				$kategori = "Aset PO";
		}
		return $kategori;
	}

	public function index(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$data['content'] = $this->Po_model->getPo();
		$this->load->view('tablePage', $data);
	}

	public function detail($id){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['subkategori'] = "detail".$sid;
		$data['content'] = $this->Po_model->getPoDetail($sid);
		$data['idspk'] = $sid;
    	$this->load->view('tableDetailPage', $data);
	}

	//detail aset dari detail po
	public function detAsetSPK($id){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(2);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['subkategori'] = "detail".$sid;
		$data['content'] = $this->Aset_model->detAsetSPK($sid);
    	$this->load->view('tableDetailPage', $data);
	}


//form
	public function setAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$data['content'] = $this->Po_model->getAllForm();
		$data['contentdet'] = $this->Po_model->setDetail();
		$data['contentaset'] = $this->Aset_model->getAsetAll();
		$this->load->view('addFormPage', $data);
	}


}
