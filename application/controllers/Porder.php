<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porder extends MY_MainController {
	protected $access = "Admin";

	// private $title;
	public function __construct(){
		 parent::__construct();
		 $this->load->model('Po_model');
		 $this->load->model('Aset_model');
		 $this->load->model('vendor_model');
		 $this->load->model('lokasiModel');
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
		else if ($nomer == 3){
			$kategori = "Detail PO";
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
		$data['subkategori'] = "detail ".$sid;
		$data['content'] = $this->Po_model->getPoDetail($sid);
		$data['idspk'] = $sid;
    	$this->load->view('tableDetailPage', $data);
	}

	//detail aset dari detail po
	public function detAsetSPK($id, $skat){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$sid = base64_decode($id);
		$sid = $this->encryption->decrypt($sid);
		$skat = base64_decode($skat);
		$skat = $this->encryption->decrypt($skat);
		$data['lokasi'] = $this->lokasiModel->getLokasi();
		$data['subkategori'] = "detail ". $sid ;
		$data['subsubkategori'] ="detail ". $skat;
		$data['content'] = $this->Aset_model->detAsetSPK($skat);
    	$this->load->view('tableDetailPage2', $data);
	}

	public function formdetailpo($spk){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(3);
		$sid = base64_decode($spk);
		$sid = $this->encryption->decrypt($sid);
		$data['subkategori'] = "detail";
		$data['spk'] = $sid;
		$data['lokasi'] = $this->lokasiModel->getLokasi();
		$data['content'] = $this->Po_model->setDetail();
		$data['contentdet'] = $this->Aset_model->getAsetAll();
		$x = $this->Po_model->getLastId();
		if(!$x){
			$data['idda'] = 1;
		}else{
			$data['idda']  = $x->row()->id_da;
			$data['idda'] = $data['idda'] + 1 ;
		}
		// echo $data['idda'];
		// $data['subktg'] = $this->Po_model->getSubktg();
    	$this->load->view('addFormPage', $data);
	}


//form
	public function setAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori(1);
		$data['content'] = $this->Po_model->getAllForm();
		$data['idven'] =  $this->vendor_model->getAll();
		$this->load->view('addFormPage', $data);
	}

	public function oneList($nama){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$get  = $this->Po_model->getOneList($nama)->result_array();


		foreach($get as $row){
			$result['NO SPK'] = $row['NO SPK'];
			$result['NAMA VENDOR'] = $row['NAMA VENDOR'];
			$result['NAMA PIC'] = $row['NAMA PIC'];
			$result['TAHUN PENGADAAN'] = $row['TAHUN PENGADAAN'];
			$result['FILE SPK'] = $row['FILE SPK'];
		}
		echo json_encode($result);
	}

	public function deletePorder($nama){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$data['content'] = $this->Po_model->deletePorder($nama);
		// $message = "tes";
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

	//insert po
	public function insPo(){
		$spk = $this->input->post('NO_SPK');
		$idv = $this->input->post('ID_VENDOR');
		$thada = $this->input->post('TAHUN_PENGADAAN');
		$file = file_get_contents($_FILES['userfile']['tmp_name']);

		$data = array(
			'NO_SPK' => $spk,
			'ID_VENDOR' => $idv,
			'TAHUN_PENGADAAN' => $thada,
			'FILE_SPK' => $file

		);
		if($spk != null && $idv != null){
			$try = $this->Po_model->setPO($data, 'po', $spk);
			if ($try > 0) {
		      echo "<script>alert('ERROR! SPK Number already exist!')</script>";
		      redirect('Purchase_Order', 'refresh');
			}
		}
		$u = $this->encryption->encrypt($spk);
		$s = base64_encode($u);
		redirect('Purchase_Order/det/'.$s, 'refresh');
	}

	//insert detail po
	public function insDetPO($count){
		$spk = $this->input->post('NO_SPK');
		$qty = $this->input->post('KUANTITAS');
		$masa = $this->input->post('MASA');
		$ktg = $this->input->post('KATEGORI');
		$sub = $this->input->post('SUB_KATEGORI');
		$datadet = array(
			'NO_SPK' => $spk,
			'QTY_ALL' => $qty,
			'QTY_TERSEDIA' => $qty,
			'MASA' => $masa,
			'KATEGORI' => $ktg,
			'SUB_KATEGORI' => $sub
		);
		if($spk != null){
			$this->Po_model->setDetPO($datadet, 'detail_po');

		}

		$idda = $this->input->post('ID_DA');
		// echo $count;
		for ($i=1; $i <= $count; $i++) {
			$sn = $this->input->post('SN'.$i);
			$checksum = $this->input->post('CHECKSUM'.$i);
			$lok = $this->input->post('ID_PERUSAHAAN'.$i);
			$tipe = $this->input->post('TIPE'.$i);
			$merk = $this->input->post('MERK'.$i);
			$series = $this->input->post('SERIES'.$i);
			$img = $this->input->post('IMAGE'.$i);
			$dataaset = array(
				'SN' => $sn,
				'ID_DA' => $idda,
				'ID_PERUSAHAAN' => $lok,
				'CHECKSUM' => $checksum,
				'TIPE' => $tipe,
				'MERK' => $merk,
				'SERIES' => $series,
				'IMAGE' => $img
			);
			// echo $idda. " ".$sn." yoy  ";
			if($idda != null && $sn != null){
				$try = $this->Aset_model->setAset($dataaset, 'aset', $sn);
				if ($try > 0) {
			      echo "<script>alert('ERROR! Serial Number already exist!')</script>";
			      // echo anchor('Purchase_Order');
			      redirect('Purchase_Order', 'refresh');
				}

			}
		}
		$u = $this->encryption->encrypt($spk);
		$s = base64_encode($u);
		redirect('Purchase_Order/det/'.$s);
	}

	//update po
	public function upPO(){
		$spk = $this->input->post('NO_SPK');
		$th = $this->input->post('TAHUN_PENGADAAN');
		$file = $this->input->post('FILE_SPK');

		$data = array(
			'NO_SPK' => $spk,
			'TAHUN_PENGADAAN' => $th
			// 'FILE_SPK' => $file
		);
		$this->Po_model->upPO($data, 'po', $spk);
		redirect('Purchase_Order');
	}

	public function oneListAsetPo($nama){
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$get  = $this->Po_model->getOneListAsetPo($nama)->result_array();
					foreach($get as $row){
					$result['SN'] = $row['SN'];
					$result['CHECKSUM'] = $row['CHECKSUM'];
					$result['SERIES'] = $row['SERIES'];
					$result['MERK'] = $row['MERK'];
					$result['TIPE'] = $row['SERIES'];
					$result['NAMA PERUSAHAAN'] = $row['NAMA_PERUSAHAAN'];
					$result['KOTA'] = $row['KOTA'];
					// $result['NAMA PERUSAHAAN'] = $row['NAMA PERUSAHAAN'];

					}
					echo json_encode($result);
					// return $result;
		// while ($row = $content->fetch_assoc()) {
		// 						# code...
		// 						$jsonArrayObject = (array('ID' => $row["ID"], 'NAMA VENDOR' => $row["NAMA VENDOR"], 'NAMA PIC' => $row["NAMA PIC"]));
		// 						$arr[$inc] = $jsonArrayObject;
		// 						$inc++;
		// 				}
		//
		// $json_array = json_encode($arr);

		// echo json_encode($data);
		// echo json_encode(	$data);

	}

	public function upAsetPo(){
		$sn = $this->input->post('SN');
		$cek = $this->input->post('CHECKSUM');
		$merk = $this->input->post('MERK');
		$tipe = $this->input->post('TIPE');
		$seri = $this->input->post('SERIES');
		$stat = $this->input->post('STATUS_ASET');
		$id = $this->input->post('ID_PERUSAHAAN');

		$data = array(
			'CHECKSUM' => $cek,
			'MERK' => $merk,
			'TIPE' => $tipe,
			'SERIES' => $seri,
			'STATUS_ASET' => $stat,
			'ID_PERUSAHAAN' => $id
		);

		$this->Po_model->upAset($data,'aset',$sn);
		// redirect('po');
		redirect('Purchase_Order');

	}



}
