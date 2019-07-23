<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Po_model extends CI_Model {

  private $query;
  private $fields;

  public function __construct()
  {
      parent::__construct();
  }

  public function getPo(){
    $fields = $this->db->query("SELECT po.NO_SPK AS 'NO SPK', vendor.NAMA_VENDOR AS 'NAMA VENDOR', vendor.NAMA_PIC AS 'NAMA PIC',po.TAHUN_PENGADAAN AS 'TAHUN PENGADAAN', po.FILE_SPK AS 'FILE SPK'
      FROM po
      join vendor on po.ID_VENDOR = vendor.ID_VENDOR
      ORDER BY po.tahun_pengadaan ASC");
    return $fields;
  }

  public function getPoDetail($id){
    $query = 'SELECT detail_po.ID_DA, detail_po.KATEGORI as "KATEGORI",detail_po.SUB_KATEGORI as "SUB KATEGORI", detail_po.MASA, detail_po.QTY
    FROM po
    right join detail_po on detail_po.NO_SPK = po.NO_SPK
    where po.NO_SPK = ?';

    $fields = $this->db->query($query, array($id));
    return $fields;
  }

  function getAllForm(){
    $data = $this->db->query("SELECT * from po");
    return $data;
  }  

  function setDetail(){
    $data = $this->db->query("SELECT QTY, MASA, KATEGORI, SUB_KATEGORI from detail_po");
    return $data;
  }

  function setPO($data, $table){
    $this->db->insert($table, $data);
  }

}
