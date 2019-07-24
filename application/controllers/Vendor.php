<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('vendor_model');
	}

	public function setTitle(){
		$title = "Vendor";
		return $title;
	}

	public function setKategori(){
		$kategori = "Vendor";
		return $kategori;
	}

	public function index(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['content'] = $this->vendor_model->getVendor();
		$this->load->view('tablePage', $data);
	}

	public function list($nama){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['subkategori'] = "detail";
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$data['content'] = $this->vendor_model->getList($nama);
		$this->load->view('tableDetailPage', $data);
	}

	public function oneList($nama){
		// $data['page_title'] = $this->setTitle();
		// $data['kategori'] = $this->setKategori();
		// $data['subkategori'] = "detail";
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$get  = $this->vendor_model->getOneList($nama)->result_array();

		// $get = $this->Model->Getbarang(array('id_barang'=>$id_barang))->result_array();

					foreach($get as $row){
					$result['ID'] = $row['ID'];
					$result['NAMA VENDOR'] = $row['NAMA VENDOR'];
					$result['NAMA PIC'] = $row['NAMA PIC'];

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

	public function deleteVendor($nama){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setKategori();
		$data['subkategori'] = "detail";
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$data['content'] = $this->vendor_model->deleteVendor($nama);
// $data['content'] = 1;
		if($data['content'])
        {
					$response = array(
						// keys
						"success" => "true"
					);

          echo json_encode($response);
					// redirect(refresh);
					// redirect('vendor_list');
        }
     else
        {
					$response = array(
						// keys
						"success" => "false"
					);

          echo json_encode($response);
        }
	}

	public function setAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setTitle();
		$data['content'] = $this->vendor_model->getAllForm();
		$this->load->view('addFormPage', $data);
	}

}
