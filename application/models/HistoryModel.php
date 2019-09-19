<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {
  function __construct(){
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
    $data = $this->db->query("SELECT ha.id as ID,ha.nip as NIP, dh.sn AS SN, ha.tgl_pinjam as TGL_PINJAM, dh.tgl_tenggat as TGL_TENGGAT, dh.tgl_kembali AS TGL_KEMBALI, dh.kondisi AS KONDISI
      , ha.BUKTI_PEMINJAMAN AS 'BUKTI PEMINJAMAN' , CASE `dh`.`STATUS` WHEN '0' THEN 'Pinjam' WHEN '1' THEN 'Kembali' WHEN '2' THEN 'Service' END AS `STATUS`
            from history_aset as ha
            join detail_history as dh on ha.id = dh.id");
    return $data;
  }

  function getAllForm(){
    $data = $this->db->query("SELECT * from history_aset");
    return $data;
  }

  function getLastId(){
    $data = $this->db->query("SELECT ha.id as id
          FROM history_aset AS ha
          ORDER BY id DESC LIMIT 1");
    if($data->num_rows() == 0){
      $this->db->query("ALTER TABLE history_aset AUTO_INCREMENT = 1");
      return $data = false;
    }
    return $data;
  }

  function getAllFormDetail(){
    $data = $this->db->query("SELECT SN, TGL_TENGGAT, KONDISI, STATUS
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
    $query = "SELECT * FROM terlambat WHERE id = ? AND sn = ?" ;
    $data = $this->db->query($query, array($id, $sn));
    return $data;
  }

  function getHistoryPegawai($nip){
    $query = "SELECT * FROM get_history_by WHERE nip = ?";
    $data = $this->db->query($query, array($nip));
    return $data;
  }

  function getHistoryAset($sn){
     $query = "SELECT * FROM get_history_by WHERE sn = ?";
    $data = $this->db->query($query, array($sn));
    return $data;
  }

  public function getOneList($nama, $sn){
    $fields = $this->db->query("CALL get_historyonelist(?, ?)", array($nama, $sn));
    return $fields;
  }

  function upHistory($data, $table, $id){
    $this->db->where('ID', $id);
    $this->db->update($table, $data);
  }

  function upHistoryDet($data, $table, $id, $sn){
    $this->db->where('ID', $id);
    $this->db->where('SN', $sn);
    $this->db->update($table, $data);
  }

  function setHistory($data, $table){
    $this->db->insert($table, $data);
  }

  // function cekExist($id){
  //   $que = $this->db->query("SELECT id FROM detail_history where id = ?",array($id));
  //   $que = $que->num_rows();
  //   return $que;
  // }

  function deleteHistoryAset($id){
    $this->db->where('ID', $id);
    $this->db->delete('history_aset');
  }

  function setHistoryDet($data, $table, $sn){
    $que = $this->db->query("SELECT status_aset FROM aset where sn = ?",array($sn));
    $que = $que->row()->status_aset;
    if($que == '0'){
      
      return $que;
    }else{
      $this->db->insert($table, $data);
    }
  }
}
