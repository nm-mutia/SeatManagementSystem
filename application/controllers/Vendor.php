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
		 // echo json_encode(array("status" => TRUE));
		// if($data['content'] == 0){
		// 	$message = "Maaf, Data tidak bisa dihapus karena masih digunakan";
		// 	$lokasi = base_url().$this->uri->segment(1);
		// 	echo "<script type='text/javascript'>alert('$message');
		// 	window.location = '$lokasi'; </script>";
			// redirect('vendor_list');
						// echo json_encode($data);
		// }else {
					// redirect('vendor_list');
					// echo json_encode($data);
		// }
		// $this->load->view('tablePage', $data);

	}

	public function setAll(){
		$data['page_title'] = $this->setTitle();
		$data['kategori'] = $this->setTitle();
		$data['content'] = $this->vendor_model->getAllForm();
		$this->load->view('addFormPage', $data);
	}

}
