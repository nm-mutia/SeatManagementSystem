<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('historyModel');
		 $this->load->model('vendor_model');
		 $this->load->model('Aset_model');
		 $this->load->model('po_model');
	}

	//create
	//tambah data tabel
	public function history(){
		$idh = $this->input->post('ID_HISTORY');
		$idv = $this->input->post('ID_VENDOR');
		$nik = $this->input->post('NIK');
		$tgl = $this->input->post('TGL_PINJAM');
		$sn = $this->input->post('SN');
		$tgl = $this->input->post('TGL_TENGGAT');
		$tkem = $this->input->post('TGL_KEMBALI');
		$ket = $this->input->post('KETERANGAN');

		$data = array(
			'ID_HISTORY' => $idh,
			'ID_VENDOR' => $idv,
			'NIK' => $nik,
			'TGL_PINJAM' => $tgl
		);
		$datadet = array(
			'ID_HISTORY' => $idh,
			'SN' => $sn,
			'TGL_TENGGAT' => $tgl,
			'TGL_KEMBALI' => $tkem,
			'KETERANGAN' => $ket
		);

		if($idv != null && $nik != null){
			$this->historyModel->setHistory($data, 'history_aset');
		}
		if($idh != null && $sn != null){
			$this->historyModel->setHistory($datadet, 'detail_history');
		}
		redirect('history');
	}
	
	public function Purchase_Order(){
		$spk = $this->input->post('NO_SPK');
		$idv = $this->input->post('ID_VENDOR');
		$thada = $this->input->post('TAHUN_PENGADAAN');
		$qty = $this->input->post('QTY');
		$masa = $this->input->post('MASA');
		$ktg = $this->input->post('KATEGORI');
		$sub = $this->input->post('SUB_KATEGORI');
		// $file = $this->input->post('FILE_SPK');
		$sn = $this->input->post('SN');
		$idda = $this->input->post('ID_DA');
		$checksum = $this->input->post('CHECKSUM');
		$tipe = $this->input->post('TIPE');
		$merk = $this->input->post('MERK');
		$series = $this->input->post('SERIES');
		// $img = $this->input->post('IMAGE');

		$data = array(
			'NO_SPK' => $spk,
			'ID_VENDOR' => $idv,
			'TAHUN_PENGADAAN' => $thada
			// 'NAMA_PIC' => $namap
		);

		$datadet = array(
			'NO_SPK' => $spk,
			'QTY' => $qty,
			'MASA' => $masa,
			'KATEGORI' => $ktg,
			'SUB_KATEGORI' => $sub
		);

		$dataaset = array(
			'SN' => $sn,
			'ID_DA' => $idda,
			'CHECKSUM' => $checksum,
			'TIPE' => $tipe,
			'MERK' => $merk,
			'SERIES' => $series
			// 'IMAGE' => $img
		);

		if($spk != null && $idv != null){
			$this->po_model->setPO($data, 'po');
		}
		if($spk != null){
			$this->po_model->setPO($datadet, 'detail_po');
		}
		if($idda != null && $sn != null){
			$this->Aset_model->setAset($dataaset, 'aset');
		}
		redirect('Purchase_Order');
	}
	

	public function aset(){
		$sn = $this->input->post('SN');
		$idda = $this->input->post('ID_DA');
		$checksum = $this->input->post('CHECKSUM');
		$tipe = $this->input->post('TIPE');
		$merk = $this->input->post('MERK');
		$series = $this->input->post('SERIES');
		// $img = $this->input->post('IMAGE');

		$data = array(
			'SN' => $sn,
			'ID_DA' => $idda,
			'CHECKSUM' => $checksum,
			'TIPE' => $tipe,
			'MERK' => $merk,
			'SERIES' => $series
			// 'IMAGE' => $img
		);
		
		$this->Aset_model->setAset($data, 'aset');
		redirect('aset');
	}
	public function vendor_list(){
		// $idv = $this->input->post('ID_VENDOR');
		$namav = $this->input->post('NAMA_VENDOR');
		$idp = $this->input->post('ID_PIC');
		$namap = $this->input->post('NAMA_PIC');

		$data = array(
			// 'ID_VENDOR' => $idv,
			'NAMA_VENDOR' => $namav,
			'ID_PIC' => $idp,
			'NAMA_PIC' => $namap
		);

		$this->vendor_model->setVendor($data, 'vendor');
		redirect('vendor_list');
	}


	//u
}