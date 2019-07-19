<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	private $data;

	public function __construct(){
		 parent::__construct();
		 $this->load->model('Aset_model');
	}

	public function setTitle(){
		$title = "Aset";
		return $title;
	}

	public function setKategori(int $nomer){
		if ($nomer == 1){
				$kategori = "Aset Keseluruhan";
		}else if ($nomer == 2){
				$kategori = "Aset yang tersedia";
		}
		return $kategori;
	}

	public function setSubKategori(){
		$subKategori = "detail";
		return $subKategori;
	}

	//untuk aset tersedia
	public function index(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(2);
		$data['content'] = $this->Aset_model->getAsetTersedia();
		$this->load->view('tablePage', $data);
	}

	public function detail($id){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(2);
		$data['subkategori'] =  $this->setSubKategori();;//masih ngarang
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['content'] = $this->Aset_model->getAsetTersediaDetail($sid);
		$this->load->view('tableDetailPage', $data);
	}


//untuk aset keseluruhan
	public function getAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$data['content'] = $this->Aset_model->getAsetKeseluruhan();
		// $data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}

	public function kesAsetDetail($id){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['subkategori'] =  $sid;
		$data['content'] = $this->Aset_model->getAsetKeseluruhanDet($sid);
		$this->load->view('tableDetailPage', $data);
	}

	public function kesAsetDetails($id , $skat){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$skat = base64_decode($skat);
		$skat = $this->encryption->decrypt($skat);
		$data['subkategori'] =  $sid;
		$data['subsubkategori'] =  $skat;
		$data['content'] = $this->Aset_model->getAsetKeseluruhanDets($sid, $skat);
		$this->load->view('tableDetailPage2', $data);
	}


	public function setAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$data['controller'] = $this;
		$data['content'] = $this->Aset_model->getAsetAll();
		$this->load->view('addFormPage', $data);
	}
}
