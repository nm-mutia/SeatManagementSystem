<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('historyModel');
		 $this->load->model('karyawanModel');
		 $this->load->model('Aset_model');
		 $this->load->model('vendor_model');
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

	public function setDetail(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(3);
		$data['content'] = $this->historyModel->getAllForm();
		$data['contentdet'] = $this->historyModel->getAllFormDetail();
		$data['idhist'] = $this->historyModel->getLastId()->row()->id_history;
		$data['idven'] =  $this->vendor_model->getAll();
		$this->load->view('addFormPage', $data);
	}

	public function oneList($nama, $sn){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$get  = $this->historyModel->getOneList($nama, $sn)->result_array();
		// echo $sn.$nama;

		foreach($get as $row){
			$result['ID_HISTORY'] = $row['ID_HISTORY'];
			$result['NIK'] = $row['NIK'];
			$result['TGL_PINJAM'] = $row['TGL_PINJAM'];
			$result['SN'] = $row['SN'];
			$result['TGL_TENGGAT'] = $row['TGL_TENGGAT'];
			$result['TGL_KEMBALI'] = $row['TGL_KEMBALI'];
			$result['KETERANGAN'] = $row['KETERANGAN'];
		}

		echo json_encode($result);
	}

	public function insHistory($count){
		$idv = $this->input->post('ID_VENDOR');
		$nik = $this->input->post('NIK');
		$tpin = $this->input->post('TGL_PINJAM');
		$data = array(
			'ID_VENDOR' => $idv,
			'NIK' => $nik,
			'TGL_PINJAM' => $tpin
		);
		if($idv != null && $nik != null){
			$this->historyModel->setHistory($data, 'history_aset');
		}

		for ($i=1; $i <= $count; $i++) {
			$idh = $this->input->post('ID_HISTORY');
			$sn = $this->input->post('SN'.$i);
			$tteng = $this->input->post('TGL_TENGGAT'.$i);
			$tkem = $this->input->post('TGL_KEMBALI'.$i);
			$ket = $this->input->post('KETERANGAN'.$i);
			$datadet = array(
				'ID_HISTORY' => $idh,
				'SN' => $sn,
				'TGL_TENGGAT' => $tteng,
				'TGL_KEMBALI' => $tkem,
				'KETERANGAN' => $ket
			);
			if($idh != null && $sn != null){
				$this->historyModel->setHistory($datadet, 'detail_history');
			}
		}
		redirect('history');
	}

	//update history
	public function upHistory(){
		$id = $this->input->post('ID_HISTORY');
		$sn = $this->input->post('SN');
		$tpin = $this->input->post('TGL_PINJAM');
		$tteng = $this->input->post('TGL_TENGGAT');
		$tkem = $this->input->post('TGL_KEMBALI');
		$ket = $this->input->post('KETERANGAN');

		$data = array(
			'TGL_PINJAM' => $tpin
		);
		$datax = array(
			'TGL_TENGGAT' => $tteng,
			'TGL_KEMBALI' => $tkem,
			'KETERANGAN' => $ket,
		);

		$this->historyModel->upHistory($data,'history_aset',$id);
		$this->historyModel->upHistoryDet($datax,'detail_history',$id,$sn);
		redirect('history');
	}
}
