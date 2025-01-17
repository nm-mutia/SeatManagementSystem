<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends MY_MainController {
	protected $access = "Admin";

	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('historyModel');
		 $this->load->model('pegawaiModel');
		 $this->load->model('Aset_model');
		 $this->load->model('vendor_model');
	}

	public function setTitle(int $nomer){
		if ($nomer == 1){
				$title = "History";
		}else if ($nomer == 2){
				$title = "Peminjaman";
		}

		return $title;
	}

	public function setKategori(int $nomer){
		if ($nomer == 1){
				$kategori = "History Aset";
		}else if ($nomer == 2){
				$kategori = "History Pegawai";
		}else if($nomer == 3){
				$kategori = "History";
		}else if($nomer == 4){
				$kategori = "Tenggat";
		}
		return $kategori;
	}

	public function setSubKategori(){
		$subKategori = "detail";
		return $subKategori;
	}


//pegawai
	public function pegawai(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(2);
		$data['content'] = $this->pegawaiModel->getPegawai();
		$this->load->view('tablePage', $data);
	}

	public function detPegawai($nip){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] =  $this->setKategori(2);
		$data['subkategori'] = $this->setSubKategori();;
		$nip = base64_decode($nip);
		$nip = $this->encryption->decrypt($nip);
		$data['content'] = $this->historyModel->getHistoryPegawai($nip);
    	$this->load->view('tableDetailPage', $data);
	}

//aset
	public function aset(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] =  $this->setKategori(1);
		$data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}

	public function detAset($sn){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] =  $this->setKategori(1);
		$data['subkategori'] = $this->setSubKategori();
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$data['content'] = $this->historyModel->getHistoryAset($sn);
    	$this->load->view('tableDetailPage', $data);
	}


//menu history

	public function getAll(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] =  $this->setKategori(3);
		$data['content'] = $this->historyModel->getAll();
		$this->load->view('tablePage', $data);
	}

	public function detail($sn){ //masih ngarang
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(3);
		$data['subkategori'] = $this->setSubKategori();
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$data['content'] = $this->historyModel->getHistoryAset($sn);
	    $this->load->view('tableDetailPage', $data);
	}

//tenggat
	public function tenggat(){
		$data['page_title'] = $this->setTitle(2);
		$data['kategori'] = $this->setKategori(4);
	  	$data['content'] = $this->historyModel->getTenggattable();
		$this->load->view('tablePage', $data);
	}
	public function tenggat_detail($id, $sn){
		$data['page_title'] = $this->setTitle(2);
		$data['kategori'] = $this->setKategori(4);
		$data['subkategori'] = $this->setSubKategori();
	  	$data['content'] = $this->historyModel->getTenggatdetail($id, $sn);
	  	$id = base64_decode($id);
		$id = $this->encryption->decrypt($id);
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$this->load->view('tableDetailPage', $data);
	}

//form

	public function setDetail(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(3);
		$data['content'] = $this->historyModel->getAllForm();
		$data['contentdet'] = $this->historyModel->getAllFormDetail();
		$data['idven'] =  $this->vendor_model->getAll();
		$data['nip'] = $this->pegawaiModel->getPegawai();
		$x = $this->historyModel->getLastId();
		if(!$x){
			$data['idhist'] = 1;
		}else{
			$data['idhist']  = $x->row()->id;
			$data['idhist'] = $data['idhist'] + 1 ;
		}
		$this->load->view('addFormPage', $data);
	}

	public function get_merk(){
		$nip = $this->input->post('nip', TRUE);
		$data = $this->Aset_model->getMerk($nip);
        echo json_encode($data);
	}

	public function get_tipe(){
		$nip = $this->input->post('nip', TRUE);
		$merk = $this->input->post('merk', TRUE);
		$data = $this->Aset_model->getTipe($nip, $merk);
        echo json_encode($data);
	}

	public function get_sn_mts(){
		$snip = $this->input->post('nip', TRUE);
		$smerk = $this->input->post('merk_nm', TRUE);
		$stipe = $this->input->post('tipe_nm', TRUE);
		$sseri = $this->input->post('seri_nm', TRUE);
		$data = $this->Aset_model->get_sn_mtsmodel($snip, $smerk, $stipe, $sseri);
        echo json_encode($data);
	}


	public function oneList($nama, $sn){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$sn = base64_decode($sn);
		$sn = $this->encryption->decrypt($sn);
		$get  = $this->historyModel->getOneList($nama, $sn)->result_array();
		// // echo $sn.$nama;
		// echo $nama." ".$sn;
		// $message = "helo";
  //       echo "<script type='text/javascript'>alert('$message');</script>";
		// var_dump($get);
		// echo $nama.'h e'.$sn;

		foreach($get as $row){
			$result['ID'] = $row['ID'];
			$result['NIP'] = $row['NIP'];
			$result['SN'] = $row['SN'];
			$result['TGL_PINJAM'] = $row['TGL_PINJAM'];
			$result['TGL_TENGGAT'] = $row['TGL_TENGGAT'];
			$result['TGL_KEMBALI'] = $row['TGL_KEMBALI'];
			$result['KONDISI'] = $row['KONDISI'];
			$result['STATUS'] = $row['STATUS'];
			// $result['BUKTI_PEMINJAMAN'] = $row['BUKTI_PEMINJAMAN'];
		}
		echo json_encode($result);
	}

	//insert
	public function insHistory($count){
		$idv = $this->input->post('ID');
		$nip = $this->input->post('NIP');
		$tpin = $this->input->post('TGL_PINJAM');
		// $bukti = $this->input->post('BUKTI_PEMINJAMAN');
		$file = file_get_contents($_FILES['userfile']['tmp_name']);

		$data = array(
			'ID' => $idv,
			'NIP' => $nip,
			'TGL_PINJAM' => $tpin,
			'BUKTI_PEMINJAMAN' => $file
		);
		if($nip != null){
			$this->historyModel->setHistory($data, 'history_aset');
		}
		echo '<script>alert("halo")</script>';
		for ($i=1; $i <= $count; $i++) {
			$idh = $this->input->post('ID');
			$sn = $this->input->post('SN'.$i);
			$tteng = $this->input->post('TGL_TENGGAT'.$i);
			// $tkem = $this->input->post('TGL_KEMBALI'.$i);
			$ket = $this->input->post('KONDISI'.$i);
			$st = $this->input->post('STATUS'.$i);
			// echo "halolagi ".$idh." ".$sn." ".$tteng." ".$st;
			$datadet = array(
				'ID' => $idh,
				'SN' => $sn,
				'TGL_TENGGAT' => $tteng,
				// 'TGL_KEMBALI' => $tkem,
				'KONDISI' => $ket,
				'STATUS' => $st
			);
			if($idh != null && $sn != null){
				$try = $this->historyModel->setHistoryDet($datadet, 'detail_history', $sn);
				if ($try == 0) {
			      
				}
			}
		}

		// if($this->historyModel->cekExist($idh) == 0){
		// 	$this->historyModel->deleteHistoryAset($idh);
		// 	echo '<script>alert("Aset tidak tersedia")</script>';
		// 	      redirect('history', 'refresh');
		// }

		redirect('history');
	}

	//update history
	public function upHistory(){
		$id = $this->input->post('ID');
		$sn = $this->input->post('SN');
		$tpin = $this->input->post('TGL_PINJAM');
		$tteng = $this->input->post('TGL_TENGGAT');
		$tkem = $this->input->post('TGL_KEMBALI');
		$ket = $this->input->post('KONDISI');
		$st = $this->input->post('STATUS');

		if($tkem == ''){
			$tkem = null;
		}
		$data = array(
			'TGL_PINJAM' => $tpin
		);
		$datax = array(
			'TGL_TENGGAT' => $tteng,
			'TGL_KEMBALI' => $tkem,
			'KONDISI' => $ket,
			'STATUS' => $st
		);

		$this->historyModel->upHistory($data,'history_aset',$id);
		$this->historyModel->upHistoryDet($datax,'detail_history',$id,$sn);
		redirect('history');
	}
}
