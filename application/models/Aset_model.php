<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aset_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }


  function getAsetTersedia(){
    $q = $this->db->query('SELECT KATEGORI
            FROM detail_po
            GROUP BY KATEGORI; ');
    return $q;
  }

  function getAsetKeseluruhan(){
    $q = $this->db->query('SELECT KATEGORI,SUM(QTY) AS "JUMLAH"
            FROM detail_po
            GROUP BY KATEGORI; ');
    return $q;
  }

  function getAsetKeseluruhanDet($id){
    // $q = $this->db->query('SELECT detail_po.SUB_KATEGORI, detail_po.MASA,
    //   aset.SN, aset.CHECKSUM,ASET.TIPE, ASET.MERK, ASET.SERIES, ASET.IMAGE
    //     FROM detail_po JOIN aset ON detail_po.ID_DA = aset.ID_DA
    //     WHERE detail_po.KATEGORI = ?' , array($id));
    $q = $this->db->query('SELECT SUB_KATEGORI, SUM(QTY) AS "JUMLAH"
    FROM detail_po
    where kategori = ?
    GROUP BY SUB_KATEGORI;' , array($id));

    // $query = "SELECT SUB_KATEGORI, SUM(QTY) AS 'JUMLAH'
    // FROM detail_po
    // where kategori = ?
    // GROUP BY SUB_KATEGORI;"
    // $q = $this->db->query($query , array($id));

    return $q;
  }

  function getAsetKeseluruhanDets($id , $skat){
    // $q = $this->db->query('SELECT detail_po.SUB_KATEGORI, detail_po.MASA,
    //   aset.SN, aset.CHECKSUM,ASET.TIPE, ASET.MERK, ASET.SERIES, ASET.IMAGE
    //     FROM detail_po JOIN aset ON detail_po.ID_DA = aset.ID_DA
    //     WHERE detail_po.KATEGORI = ?' , array($id));
    $q = $this->db->query('SELECT po.`SUB_KATEGORI` AS "SUB KATEGORI", po.`MASA` , a.`SERIES` , a.`CHECKSUM` , a.`TIPE` , a.`MERK` , a.series , a.image
FROM detail_po po JOIN aset a ON po.`ID_DA` = a.`ID_DA`
WHERE kategori = ? AND SUB_KATEGORI = ?' , array($id,$skat));

    // $query = "SELECT SUB_KATEGORI, SUM(QTY) AS 'JUMLAH'
    // FROM detail_po
    // where kategori = ?
    // GROUP BY SUB_KATEGORI;"
    // $q = $this->db->query($query , array($id));

    return $q;
  }


  function getAsetTersediaDetail($id){
    $q = $this->db->query('SELECT detail_po.SUB_KATEGORI, detail_po.MASA,
      aset.SN, aset.CHECKSUM,ASET.TIPE, ASET.MERK, ASET.SERIES, ASET.IMAGE
        FROM detail_po JOIN aset ON detail_po.ID_DA = aset.ID_DA
        WHERE detail_po.KATEGORI = ?' , array($id));
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
    $query = "SELECT a.sn as 'SN', a.checksum as 'CHECKSUM', a.tipe AS 'TIPE', a.merk AS 'MERK', a.series AS 'SERIES', a.image as 'IMAGE'
            FROM detail_po AS dpo 
            JOIN aset AS a ON a.id_da = dpo.id_da
            WHERE dpo.id_da = ?";
    // header("Content-type: image/jpeg");
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
      // $this->session->set_flashdata('error', 'Such User exists. Please try again!');
      return $count;
    }
    else{
      $this->db->insert($table, $data);
    }
  }

}
