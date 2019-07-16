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

    $data = $this->db->query("SELECT dh.id_history as id, ha.nik as nik, k.nama as nama, dh.sn as sn, a.tipe as tipe, a.merk as merk, a.series as seri, dh.tgl_tenggat as tgl  
            FROM detail_history AS dh
            JOIN history_aset AS ha ON dh.id_history = ha.id_history
            JOIN karyawan AS k ON ha.nik = k.nik
            JOIN aset AS a ON a.sn = dh.sn
            WHERE dh.tgl_tenggat <= CURDATE()");
    return $data;
    // return $q;
  }

  function getTenggatdetail($id = null, $sn = null){
    // $det['data'] = $this->getTenggattable();
    $data = $this->db->query("SELECT dh.id_history as id, ha.nik as nik, k.nama as nama, dh.sn as sn, a.tipe as tipe, a.merk as merk, a.series as seri, dh.tgl_tenggat as tgl  
            FROM detail_history AS dh
            JOIN history_aset AS ha ON dh.id_history = ha.id_history
            JOIN karyawan AS k ON ha.nik = k.nik
            JOIN aset AS a ON a.sn = dh.sn
            WHERE dh.tgl_tenggat <= CURDATE()
            AND dh.id_history = $id
            AND dh.sn = $sn");
    return $data;
    // return $q;
  }

}
