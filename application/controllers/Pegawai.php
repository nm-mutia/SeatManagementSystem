<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_MainController {

	protected $access = "Staff";

	public function __construct(){
		parent::__construct();
		$this->load->model('lokasiModel');
		$this->load->model('historyModel');
	    $this->load->model('Aset_model');
	}

  public function index(){
		$this->load->view('welcome_message');
	}

}
