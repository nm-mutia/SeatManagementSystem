<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function countPeminjam(){
    $data = $this->db->query("SELECT COUNT(*) as jml
            FROM detail_history AS dh
            WHERE dh.tgl_kembali IS NULL OR dh.tgl_kembali = '0000-00-00' OR dh.tgl_kembali = ''");
    return $data;
  }
  
  function getAll(){
    $data = $this->db->query("SELECT ha.id_history as ID_HISTORY,ha.nik as NIK, ha.tgl_pinjam as TGL_PINJAM, dh.sn AS SN, dh.tgl_tenggat as TGL_TENGGAT, dh.tgl_kembali AS TGL_KEMBALI, dh.keterangan AS KETERANGAN
            from history_aset as ha
            join detail_history as dh on ha.id_history = dh.id_history");
    return $data;
  }  

  function getAllForm(){
    // $data = $this->db->query("SELECT ha.id_vendor as ID_VENDOR, ha.nik as NIK, ha.tgl_pinjam as TGL_PINJAM from history_aset as ha");
    $data = $this->db->query("SELECT * from history_aset");
    return $data;
  }

  function getLastId(){
    $data = $this->db->query("SELECT ha.id_history as id_history
          FROM history_aset AS ha
          ORDER BY id_history DESC LIMIT 1");
    if($data->num_rows() == 0){
      $this->db->query("ALTER TABLE history_aset AUTO_INCREMENT = 1");
      return $data = false;
    }
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
    $data = $this->db->query("SELECT * FROM terlambat");
    return $data;
  }

  function getTenggatdetail($id , $sn){
    $query = "SELECT * FROM terlambat
              WHERE id = ? AND sn = ?" ;
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
    
    //query pakai view
    $query = "SELECT *
              FROM get_history_by
              WHERE nik = ?";
    $data = $this->db->query($query, array($nik));
    return $data;
  }

  function getHistoryAset($sn){
     $query = "SELECT *
              FROM get_history_by
              WHERE sn = ?";
    $data = $this->db->query($query, array($sn));
    return $data;
  }

  public function getOneList($nama, $sn){
    $fields = $this->db->query("SELECT ha.id_history as ID_HISTORY,ha.nik as NIK, ha.tgl_pinjam as TGL_PINJAM, dh.sn AS SN, dh.tgl_tenggat as TGL_TENGGAT, dh.tgl_kembali AS TGL_KEMBALI, dh.keterangan AS KETERANGAN
            from history_aset as ha
            join detail_history as dh on ha.id_history = dh.id_history
            WHERE ha.id_history = ? 
            and dh.sn = ?", array($nama, $sn));
    return $fields;
  }

  function upHistory($data, $table, $id){
    $this->db->where('ID_HISTORY', $id);
    $this->db->update($table, $data);
  }

  function upHistoryDet($data, $table, $id, $sn){
    $this->db->where('ID_HISTORY', $id);
    $this->db->where('SN', $sn);
    $this->db->update($table, $data);
  }

  function setHistory($data, $table){
    $this->db->insert($table, $data);
  }


}
