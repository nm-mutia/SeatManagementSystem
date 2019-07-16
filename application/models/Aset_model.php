<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aset_model extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  function getAsetTersedia(){
    $q = $this->db->query('SELECT KATEGORI FROM detail_po ');

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

}
