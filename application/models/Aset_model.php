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
    $query = "SELECT *
      FROM aset AS a";
    $data = $this->db->query($query);
    return $data;
  }

  function setAset($data, $table){
    $this->db->insert($table, $data);
  }

}
