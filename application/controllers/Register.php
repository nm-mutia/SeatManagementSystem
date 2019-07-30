<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_MainController {
	protected $access = "Admin";

	public function index()
	{
		$this->load->view('page-register.html');
	}
}
