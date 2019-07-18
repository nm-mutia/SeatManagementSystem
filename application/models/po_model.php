<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Po_model extends CI_Model {

  private $query;
  private $fields;

  public function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  public function getPo(){
    $fields = $this->db->query('SELECT NO_SPK AS "NO SPK", NAMA_VENDOR AS "NAMA VENDOR", NAMA_PIC AS "NAMA PIC",TAHUN_PENGADAAN AS "TAHUN PENGADAN",FILE_SPK AS "FILE SPK"
      FROM po
          join vendor on po.ID_VENDOR = vendor.ID_VENDOR');
    return $fields;
  }

  public function getPoDetail($id){
    $query = 'SELECT detail_po.KATEGORI as "KATEGORI",detail_po.SUB_KATEGORI as "SUB KATEGORI", detail_po.MASA, detail_po.QTY
    FROM po
    right join detail_po on detail_po.NO_SPK = po.NO_SPK
    where po.NO_SPK = ?';

    $fields = $this->db->query($query, array($id));
    return $fields;
  }

}
