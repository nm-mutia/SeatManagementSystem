<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	private $data;

	public function __construct(){
		 parent::__construct();
		 $this->load->model('Aset_model');
		 $this->load->helper(array('form', 'url'));
	}

	public function setTitle(int $nomer){
		if ($nomer == 1){
			$title = "Aset";
		}else if ($nomer == 2){
			$title = "Log";
		}
		return $title;
	}

	public function setKategori(int $nomer){
		if ($nomer == 1){
				$kategori = "Aset Keseluruhan";
		}else if ($nomer == 2){
				$kategori = "Aset Tersedia";
		}
		else if ($nomer == 3){
				$kategori = "Aset PO";
		}else if ($nomer == 4){
				$kategori = "Log Mutasi";
		}
		else if ($nomer == 5){
				$kategori = "Log Service";
		}
		return $kategori;
	}

	public function setSubKategori(){
		$subKategori = "detail";
		return $subKategori;
	}

	//untuk aset tersedia
	public function index(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(2);
		$data['content'] = $this->Aset_model->getAsetTersedia();
		$this->load->view('tablePage', $data);
	}

	public function detail($id){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(2);
		$data['subkategori'] =  $this->setSubKategori();;//masih ngarang
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['content'] = $this->Aset_model->getAsetTersediaDetail($sid);
		$this->load->view('tableDetailPage', $data);
	}


//untuk aset keseluruhan
	public function getAll(){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(1);
		$data['content'] = $this->Aset_model->getAsetKeseluruhan();
		// $data['content'] = $this->Aset_model->getAset();
		$this->load->view('tablePage', $data);
	}

	public function kesAsetDetail($id){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(1);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$data['subkategori'] =  $sid;
		$data['content'] = $this->Aset_model->getAsetKeseluruhanDet($sid);
		$this->load->view('tableDetailPage', $data);
	}

	public function kesAsetDetails($id , $skat){
		$data['page_title'] = $this->setTitle(1);
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
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(1);
		$data['controller'] = $this;
		$data['content'] = $this->Aset_model->getAsetAll();
		$this->load->view('addFormPage', $data);
	}

	//nambah aset dari detail po
	public function setAset($idspk, $idd){
		$data['page_title'] = $this->setTitle(1);
		$data['kategori'] = $this->setKategori(3);
		$sid = base64_decode($idspk);
		$sid = $this->encryption->decrypt($sid);
		$idda = base64_decode($idd);
		$idda = $this->encryption->decrypt($idda);
		$data['subkategori'] =  $sid;
		$data['content'] = $this->Aset_model->getAsetAll();
		$data['spk'] = $sid;
		$data['da'] = $idda;
		$this->load->view('addFormPage', $data);
	}

	public function insAset($count){
		for ($i=1; $i <= $count; $i++) {

			$sn = $this->input->post('SN'.$i);
			$idda = $this->input->post('ID_DA'.$i);
			$checksum = $this->input->post('CHECKSUM'.$i);
			$tipe = $this->input->post('TIPE'.$i);
			$merk = $this->input->post('MERK'.$i);
			$series = $this->input->post('SERIES'.$i);
			// $img = $this->_uploadImage();
	       	// $this->load->library('upload', $config)

			$datax = array(
				'SN' => $sn,
				'ID_DA' => $idda,
				'CHECKSUM' => $checksum,
				'TIPE' => $tipe,
				'MERK' => $merk,
				'SERIES' => $series,
				// 'IMAGE' => $img
			);

			if($idda != null && $sn != null){
				$try = $this->Aset_model->setAset($datax, 'aset', $sn);
				if ($try > 0) {
			      echo "<script>alert('ERROR! Serial Number already exist!')</script>";
			      // echo anchor('Purchase_Order');
			      redirect('Purchase_Order', 'refresh');
				}
				// redirect('Purchase_Order', 'refresh');
			}
		}
		redirect('Purchase_Order', 'refresh');
	}


	public function getLogMutasi(){
		$data['page_title'] = $this->setTitle(2);
		$data['kategori'] = $this->setKategori(4);
		$data['content'] = $this->Aset_model->getlogMutasi();
		$this->load->view('tablePage', $data);
	}

	public function getLogService(){
		$data['page_title'] = $this->setTitle(2);
		$data['kategori'] = $this->setKategori(5);
		$data['content'] = $this->Aset_model->getlogService();
		$this->load->view('tablePage', $data);
	}

	public function deleteAset($nama){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$data['content'] = $this->Aset_model->deleteAset($nama);
		// $message = "Maaf, Data tidak bisa dihapus karena masih digunakan";
		// echo "<script type='text/javascript'>alert('$message');</script>";
		if($data['content'])
				{
					$response = array(
						"success" => "true"
					);

					echo json_encode($response);
				}
		 else
				{
					$response = array(
						"success" => "false"
					);
					echo json_encode($response);
				}
	}

}
