<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getTenggattable(){

    $data = $this->db->query("SELECT dh.id_history as id, ha.nik as nik, k.nama as nama, dh.sn as sn, a.tipe as tipe, a.merk as merk, a.series as seri, dh.tgl_tenggat as tgl
            FROM detail_history AS dh
            JOIN history_aset AS ha ON dh.id_history = ha.id_history
            JOIN karyawan AS k ON ha.nik = k.nik
            JOIN aset AS a ON a.sn = dh.sn
            WHERE dh.tgl_tenggat <= CURDATE()
            ORDER BY dh.tgl_tenggat ASC ");
    return $data;
  }

  function getTenggatdetail($id , $sn){
    // $det['data'] = $this->getTenggattable();
    $query = "SELECT dh.id_history as ID, ha.nik as NIK, k.nama as NAMA, dh.sn as SN, a.tipe as TIPE, a.merk as MERK, a.series as SERIES, dh.tgl_tenggat as TANGGAL_TENGGAT
      FROM detail_history AS dh
      JOIN history_aset AS ha ON dh.id_history = ha.id_history
      JOIN karyawan AS k ON ha.nik = k.nik
      JOIN aset AS a ON a.sn = dh.sn
      WHERE dh.tgl_tenggat <= CURDATE()
      AND dh.id_history = ?
      AND dh.sn = ? ";
    $data = $this->db->query($query, array($id, $sn));
    return $data;
  }

  function getHistoryKaryawan($nik){
    $query = "SELECT dh.id_history AS ID, ha.nik AS NIK, k.nama AS NAMA, dh.sn AS SN, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES, dh.tgl_tenggat AS TANGGAL_TENGGAT
      FROM detail_history AS dh
      JOIN history_aset AS ha ON dh.id_history = ha.id_history
      JOIN karyawan AS k ON ha.nik = k.nik
      JOIN aset AS a ON a.sn = dh.sn
      WHERE k.nik = ? ";
    $data = $this->db->query($query, array($nik));
    return $data;
  }

  function getHistoryAset($sn){
    $query = "SELECT dh.id_history as ID, ha.nik as NIK, k.nama as NAMA, dh.sn as SN, a.tipe as TIPE, a.merk as MERK, a.series as SERIES, dh.tgl_tenggat as TANGGAL_TENGGAT
      FROM detail_history AS dh
      JOIN history_aset AS ha ON dh.id_history = ha.id_history
      JOIN karyawan AS k ON ha.nik = k.nik
      JOIN aset AS a ON a.sn = dh.sn
      where a.sn = ? ";
    $data = $this->db->query($query, array($sn));
    return $data;
  }

}
