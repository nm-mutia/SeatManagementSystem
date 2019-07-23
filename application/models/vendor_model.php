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
    $fields = $this->db->query('SELECT ID_VENDOR AS "ID",  NAMA_VENDOR AS "NAMA VENDOR",NAMA_PIC AS "NAMA PIC" FROM vendor');
    return $fields;
  }

  public function getList($nama){
  	$query = "SELECT po.no_spk AS 'NO SPK', po.tahun_pengadaan AS PENGADAAN, a.sn AS SN, a.checksum AS CHECKSUM, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES, dp.kategori AS KATEGORI, dp.masa AS MASA_ASET
		FROM vendor AS v
		JOIN po ON v.id_vendor = po.id_vendor
		JOIN detail_po AS dp ON dp.no_spk = po.no_spk
		JOIN aset AS a ON a.id_da = dp.id_da
		WHERE v.id_vendor = ?";
    $data = $this->db->query($query, array($nama));
    return $data;
  }

  function getAllForm(){
    $data = $this->db->query("SELECT NAMA_VENDOR, ID_PIC, NAMA_PIC from vendor");
    return $data;
  }

  function getAll(){
    $data = $this->db->query("SELECT * from vendor");
    return $data;
  }


  function setVendor($data, $table){
    $this->db->insert($table, $data);
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
