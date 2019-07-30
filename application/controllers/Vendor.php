<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends MY_MainController {
	protected $access = "Admin";

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
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$get  = $this->vendor_model->getOneList($nama)->result_array();
					foreach($get as $row){
					$result['ID'] = $row['ID'];
					$result['NAMA VENDOR'] = $row['NAMA VENDOR'];
					$result['NAMA PIC'] = $row['NAMA PIC'];
					$result['EMAIL'] = $row['EMAIL'];
					$result['NO HP'] = $row['NO HP'];
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
		// $data['page_title'] = $this->setTitle();
		// $data['kategori'] = $this->setKategori();
		// $data['subkategori'] = "detail";
		$nama = base64_decode($nama);
		$nama = $this->encryption->decrypt($nama);
		$data['content'] = $this->vendor_model->deleteVendor($nama);
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
						"success" => "vendor false"
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

	//insert vendor
	public function insVendor(){
		$namav = $this->input->post('NAMA_VENDOR');
		$namap = $this->input->post('NAMA_PIC');
		$namae = $this->input->post('EMAIL');
		$namahp = $this->input->post('NO_HP');
		$al =  $this->input->post('ALAMAT_VENDOR');

		$data = array(
			'NAMA_VENDOR' => $namav,
			'ALAMAT_VENDOR' => $al,
			'NAMA_PIC' => $namap,
			'EMAIL' => $namae,
			'NO_HP' => $namahp
			// 'NAMA_PIC' => $namap
		);
		$this->vendor_model->setVendor($data, 'vendor');
		redirect('vendor_list');
	}

	public function upVendor(){
		$idv = $this->input->post('ID');
		$namav = $this->input->post('NAMA_VENDOR');
		$namap = $this->input->post('NAMA_PIC');
		$namae = $this->input->post('EMAIL');
		$namahp = $this->input->post('NO_HP');
		$data = array(
			'NAMA_VENDOR' => $namav,
			'NAMA_PIC' => $namap,
			'EMAIL' => $namae,
			'NO_HP' => $namahp
		);
		$this->vendor_model->upVendor($data, 'vendor', $idv);
		redirect('vendor_list');
	}
}
