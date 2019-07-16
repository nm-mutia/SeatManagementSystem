<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vendor_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getVendor(){
    $fields = $this->db->query('SELECT * FROM vendor');
    return $fields;
  }


}
