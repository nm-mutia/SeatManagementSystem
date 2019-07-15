<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aset_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getAsetTersedia(){
    // $response = array();
    // Select record
    $q = $this->db->query('SELECT KATEGORI, SUB_KATEGORI, QTY
      FROM aset
      JOIN detail_po ON ASET.ID_DA = detail_po.ID_DA
      JOIN detail_history ON detail_history.SN = ASET.SN
      JOIN history_aset ON detail_history.ID_HISTORY = history_aset.ID_HISTORY');
    // $this->db->select('*');
    // $q = $this->db->get('aset',10);
    // $response = $q->result_array();
    return $q;
  }

}
