<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HistoryModel extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getTenggattable(){

    // $response = array();

    // Select record
    // $this->db->select('*');
    // $q = $this->db->get('karyawan',10);
    // $response = $q->result_array();
    $data = $this->db->query("SELECT dh.id_history, ha.nik, k.nama, dh.sn, a.tipe, a.merk, a.series, dh.tgl_tenggat  
            FROM detail_history AS dh
            JOIN history_aset AS ha ON dh.id_history = ha.id_history
            JOIN karyawan AS k ON ha.nik = k.nik
            JOIN aset AS a ON a.sn = dh.sn
            WHERE dh.tgl_tenggat <= CURDATE()");
    return $data->result_array();
    // return $q;
  }

}
