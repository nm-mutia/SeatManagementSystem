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
	public function history($count){
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

	public function po(){
		$spk = $this->input->post('NO_SPK');
		$idv = $this->input->post('ID_VENDOR');
		$thada = $this->input->post('TAHUN_PENGADAAN');
		$data = array(
			'NO_SPK' => $spk,
			'ID_VENDOR' => $idv,
			'TAHUN_PENGADAAN' => $thada
			// 'NAMA_PIC' => $namap
		);
		if($spk != null && $idv != null){
			$this->po_model->setPO($data, 'po');
		}
		$u = $this->encryption->encrypt($spk);
		$s = base64_encode($u);
		redirect('Purchase_Order/det/'.$s);
	}

	public function insDetPO($count){
		$spk = $this->input->post('NO_SPK');
		$qty = $this->input->post('QTY');
		$masa = $this->input->post('MASA');
		$ktg = $this->input->post('KATEGORI');
		$sub = $this->input->post('SUB_KATEGORI');
		$datadet = array(
			'NO_SPK' => $spk,
			'QTY' => $qty,
			'MASA' => $masa,
			'KATEGORI' => $ktg,
			'SUB_KATEGORI' => $sub
		);
		if($spk != null){
			$this->po_model->setPO($datadet, 'detail_po');
		}

		$idda = $this->input->post('ID_DA');
		for ($i=1; $i <= $count; $i++) {
			$sn = $this->input->post('SN'.$i);
			$checksum = $this->input->post('CHECKSUM'.$i);
			$tipe = $this->input->post('TIPE'.$i);
			$merk = $this->input->post('MERK'.$i);
			$series = $this->input->post('SERIES'.$i);
			$img = $this->input->post('IMAGE'.$i);
			$dataaset = array(
				'SN' => $sn,
				'ID_DA' => $idda,
				'CHECKSUM' => $checksum,
				'TIPE' => $tipe,
				'MERK' => $merk,
				'SERIES' => $series
				// 'IMAGE' => $img
			);
			echo $idda. " ".$sn." yoy  ";
			if($idda != null && $sn != null){
				$this->Aset_model->setAset($dataaset, 'aset');
			}
		}
		$u = $this->encryption->encrypt($idda);
		$s = base64_encode($u);
		redirect('Purchase_Order/det/'.$s);
	}


	public function aset($count){
		for ($i=1; $i <= $count; $i++) {

			$sn = $this->input->post('SN'.$i);
			$idda = $this->input->post('ID_DA'.$i);
			$checksum = $this->input->post('CHECKSUM'.$i);
			$tipe = $this->input->post('TIPE'.$i);
			$merk = $this->input->post('MERK'.$i);
			$series = $this->input->post('SERIES'.$i);
			$img = $this->input->post('IMAGE');
			// echo "aigo ".$sn2 . " " .$idda2 . " " . $checksum2 . " oy ";
			$datax = array(
				'SN' => $sn,
				'ID_DA' => $idda,
				'CHECKSUM' => $checksum,
				'TIPE' => $tipe,
				'MERK' => $merk,
				'SERIES' => $series
				// 'IMAGE' => $img
			);

			if($idda != null && $sn != null){
				$this->Aset_model->setAset($datax, 'aset');
			}
		}
		redirect('aset');
	}

	public function vendor_list(){
		$namav = $this->input->post('NAMA_VENDOR');
		$idp = $this->input->post('ID_PIC');
		$namap = $this->input->post('NAMA_PIC');

		$data = array(
			'NAMA_VENDOR' => $namav,
			'ID_PIC' => $idp,
			'NAMA_PIC' => $namap
		);

		$this->vendor_model->setVendor($data, 'vendor');
		redirect('vendor_list');
	}


	//update
	public function upVendor(){
		$idv = $this->input->post('ID');
		$namav = $this->input->post('NAMA_VENDOR');
		// $idp = $this->input->post('ID_PIC');
		$namap = $this->input->post('NAMA_PIC');

		$data = array(
			'NAMA_VENDOR' => $namav,
			// 'ID_PIC' => $idp,
			'NAMA_PIC' => $namap
		);
		$this->vendor_model->upVendor($data, 'vendor', $idv);
		redirect('vendor_list');
	}

	public function upPO(){
		$spk = $this->input->post('NO_SPK');
		$th = $this->input->post('TAHUN_PENGADAAN');
		$file = $this->input->post('FILE_SPK');

		$data = array(
			'NO_SPK' => $spk,
			'TAHUN_PENGADAAN' => $th
			// 'FILE_SPK' => $file
		);
		$this->po_model->upPO($data, 'po', $spk);
		redirect('Purchase_Order');
	}

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
