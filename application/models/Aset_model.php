<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aset_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }


  function getAsetTersedia(){
    $q = $this->db->query('SELECT KATEGORI FROM detail_po GROUP BY KATEGORI; ');
    return $q;
  }

  function getAsetKeseluruhan(){
    $q = $this->db->query('SELECT KATEGORI ,COUNT(KATEGORI) AS JUMLAH
      FROM detail_po po JOIN aset a ON po.`ID_DA` = a.`ID_DA`
      GROUP BY KATEGORI;');
    return $q;
  }

  function getAsetKeseluruhanDet($id){
    $q = $this->db->query('CALL get_asetkeseluruhandet(?)' , array($id));
    return $q;
  }

  function getAsetKeseluruhanDets($id , $skat){
    $q = $this->db->query('CALL get_asetkeseluruhandet(?, ?)' , array($id,$skat));
    return $q;
  }

  function getAsetTersediaDetail($id){
    $q = $this->db->query('CALL get_asettersediadetail(?)' , array($id));
    return $q;
  }

  function getAset(){
    $query = "SELECT a.sn AS sn, a.tipe, a.merk, a.series
      FROM aset AS a";
    $data = $this->db->query($query);
    return $data;
  }

  function getAsetAll(){
    $query = "SELECT a.sn as SN, a.id_da as ID_DA, a.checksum AS CHECKSUM, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES, a.image AS IMAGE
      FROM aset AS a";
    $data = $this->db->query($query);
    return $data;
  }

  function detAsetSPK($id){
    $query = "CALL detasetspk(?)";
    $data = $this->db->query($query, array($id));
    return $data;
  }

  function setAset($data, $table, $sn){
    $query = $this->db->get_where($table, array(
            'SN' => $sn
            ));
    $count = $query->num_rows();
    if($count){
      // echo "ADA WOY";
      // echo "<script>alert('ERROR! Serial Number already exist!')</script>";
      return $count;
    }
    else{
      $this->db->insert($table, $data);
    }
  }

  function countKtg($ktg){
    $query = "CALL countktg(?)";
    $data = $this->db->query($query, array($ktg));
    mysqli_next_result( $this->db->conn_id );
    return $data;
  }

}
