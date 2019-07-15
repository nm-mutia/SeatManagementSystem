<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenggattable extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getTenggattable(){

    // $response = array();

    // Select record
    $this->db->select('*');
    $q = $this->db->get('karyawan',10);
    // $response = $q->result_array();

    return $q;
  }

}
