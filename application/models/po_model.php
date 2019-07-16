<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Po_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getPo(){
    $fields = $this->db->query('SELECT NO_SPK, NAMA_VENDOR,TAHUN_PENGADAAN,FILE_SPK
      FROM po
          join vendor on po.ID_VENDOR = vendor.ID_VENDOR');
      // $fields = $query->field_data();
      // foreach($q as $field)
      // {
      //   return $data;
      //   $data[] = $field;
      // }
    return $fields;
  }

}
