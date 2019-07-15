<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porder extends CI_Controller {
	public function __construct(){
		 parent::__construct();

		 // Load model
		 $this->load->model('Po_model');
	}
	public function index()
	{
		$data['content'] = $this->Po_model->getPo();
		$this->load->view('PurchaseOrderPage', $data);
	}
}
