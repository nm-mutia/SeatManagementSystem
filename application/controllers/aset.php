<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct(){
		 parent::__construct();

		 // Load model
		 $this->load->model('Aset_model');
	}

	public function index()
	{
		$data['content'] = $this->Aset_model->getAsetTersedia();
		$this->load->view('AsetPage', $data);
	}

	public function add()
	{
		// $this->load->view('');
	}
}
