<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vendor_model extends CI_Model {

  private  $query;
  private  $fields;
  private  $data;

  public function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  public function getVendor(){
    $fields = $this->db->query('SELECT ID_VENDOR AS "ID",  NAMA_VENDOR AS "NAMA VENDOR", NAMA_PIC AS "NAMA PIC" , EMAIL , NO_HP AS "NO HP" FROM vendor');
    return $fields;
  }

  public function getList($nama){
  	$query = "CALL getList(?);";
    $data = $this->db->query($query, array($nama));
    return $data;
  }

  public function getOneList($nama){
    $fields = $this->db->query('CALL getOneList(?)', array($nama));
    return $fields;
  }

  function getAllForm(){
    $data = $this->db->query('SELECT NAMA_VENDOR AS "NAMA VENDOR", alamat_vendor as "ALAMAT VENDOR", NAMA_PIC AS "NAMA PIC" , EMAIL , NO_HP AS "NO HP" from vendor');
    return $data;
  }

  function getAll(){
    $data = $this->db->query('SELECT * from vendor');
    return $data;
  }


  function setVendor($data, $table){
    $this->db->insert($table, $data);
  }

  function upVendor($data, $table, $id){
    $this->db->where('ID_VENDOR', $id);
    $this->db->update($table, $data);
  }

  public function deleteVendor($data){
      // $this->db->insert($table, $data);
      // $tables = array('table1', 'table2', 'table3');
      $cekrows = $this->db->query('SELECT * FROM vendor, po where vendor.ID_VENDOR = po.ID_VENDOR and vendor.ID_VENDOR = ?' , $data);

      if ($cekrows->num_rows() != 0){
        // $message = "Maaf, Data tidak bisa dihapus karena masih digunakan";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        return 0;
      }else{
        $this->db->where('ID_VENDOR', $data);
        $this->db->delete('vendor');
        return 1;
      }
      // return;
  }
}
