<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getAll(){
    $data = $this->db->query("SELECT ha.id_history as ID_HISTORY,ha.nik as NIK, ha.tgl_pinjam as TGL_PINJAM, dh.sn AS SN, dh.tgl_tenggat as TGL_TENGGAT, dh.tgl_kembali AS TGL_KEMBALI, dh.keterangan AS KETERANGAN
            from history_aset as ha
            join detail_history as dh on ha.id_history = dh.id_history");
    return $data;
  }  

  function getAllForm(){
    $data = $this->db->query("SELECT ha.id_vendor as ID_VENDOR, ha.nik as NIK, ha.tgl_pinjam as TGL_PINJAM from history_aset as ha");
    return $data;
  }

  function getAllFormDetail(){
    $data = $this->db->query("SELECT SN, TGL_TENGGAT, TGL_KEMBALI, KETERANGAN
            from detail_history ");
    return $data;
  }  

  function setDetail(){
    $data = $this->db->query("SELECT * from detail_history");
    return $data;
  }

  function getTenggattable(){
    // $data = $this->db->query("SELECT dh.id_history as id, ha.nik as nik, k.nama as nama, dh.sn as sn, a.tipe as tipe, a.merk as merk, a.series as seri, dh.tgl_tenggat as tgl
            // FROM detail_history AS dh
            // JOIN history_aset AS ha ON dh.id_history = ha.id_history
            // JOIN karyawan AS k ON ha.nik = k.nik
            // JOIN aset AS a ON a.sn = dh.sn
            // WHERE dh.tgl_tenggat <= CURDATE()
            // ORDER BY dh.tgl_tenggat ASC ");
    $data = $this->db->query("SELECT * FROM terlambat");
    return $data;
  }

  function getTenggatdetail($id , $sn){
    // $query = "SELECT dh.id_history as ID, ha.nik as NIK, k.nama as NAMA, dh.sn as SN, a.tipe as TIPE, a.merk as MERK, a.series as SERIES, dh.tgl_tenggat as TANGGAL_TENGGAT
    //   FROM detail_history AS dh
    //   JOIN history_aset AS ha ON dh.id_history = ha.id_history
    //   JOIN karyawan AS k ON ha.nik = k.nik
    //   JOIN aset AS a ON a.sn = dh.sn
    //   WHERE dh.tgl_tenggat <= CURDATE()
    //   AND dh.id_history = ?
    //   AND dh.sn = ? ";
    $query = "SELECT * FROM terlambat
              WHERE id = ? AND sn = ?" ;
    $data = $this->db->query($query, array($id, $sn));
    return $data;
  }

  function getHistoryKaryawan($nik){
    // $query = "SELECT dh.id_history AS ID, ha.nik AS NIK, k.nama AS NAMA, dh.sn AS SN, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES, dh.tgl_tenggat AS TANGGAL_TENGGAT
    //   FROM detail_history AS dh
    //   JOIN history_aset AS ha ON dh.id_history = ha.id_history
    //   JOIN karyawan AS k ON ha.nik = k.nik
    //   JOIN aset AS a ON a.sn = dh.sn
    //   WHERE k.nik = ? ";
    $query = "SELECT *
              FROM get_history_by
              WHERE nik = ?";
    $data = $this->db->query($query, array($nik));
    return $data;
  }

  function getHistoryAset($sn){
    // $query = "SELECT dh.id_history as ID, ha.nik as NIK, k.nama as NAMA, dh.sn as SN, a.tipe as TIPE, a.merk as MERK, a.series as SERIES, dh.tgl_tenggat as TANGGAL_TENGGAT
    //   FROM detail_history AS dh
    //   JOIN history_aset AS ha ON dh.id_history = ha.id_history
    //   JOIN karyawan AS k ON ha.nik = k.nik
    //   JOIN aset AS a ON a.sn = dh.sn
    //   where a.sn = ? ";
     $query = "SELECT *
              FROM get_history_by
              WHERE sn = ?";
    $data = $this->db->query($query, array($sn));
    return $data;
  }

  function setHistory($data, $table){
    $this->db->insert($table, $data);
  }

}
