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
    $query = 'CALL getPoDetail(?);';

    $fields = $this->db->query($query, array($id));
    return $fields;
  }

  function getAllForm(){
    $data = $this->db->query("SELECT * from po");
    return $data;
  }

  function setDetail(){
    $data = $this->db->query("SELECT ID_DA, NO_SPK, MASA, KATEGORI, SUB_KATEGORI from detail_po");
    return $data;
  }

  function getLastId(){
    $data = $this->db->query("SELECT po.id_da as id_da
          FROM detail_po AS po
          ORDER BY id_da DESC LIMIT 1");
    if($data->num_rows() == 0){
      $this->db->query("ALTER TABLE detail_po AUTO_INCREMENT = 1");
      return $data = false;
    }
    return $data;
  }

  public function getOneList($nama){
    $fields = $this->db->query("CALL getOneListPo(?); ", array($nama));
    return $fields;
  }

  // function getSubktg(){
  //   $data = $this->db->query("SELECT DISTINCT SUB_KATEGORI FROM detail_po ORDER BY kategori");
  //   return $data;
  // }

  function upPO($data, $table, $id){
    $this->db->where('NO_SPK', $id);
    $this->db->update($table, $data);
  }

  function setPO($data, $table, $spk){
    $query = $this->db->get_where($table, array('NO_SPK' => $spk));

    $count = $query->num_rows();
    var_dump($query->row());
    if($count){
      // echo "ADA WOY";
      // $this->session->set_flashdata('error', 'Such User exists. Please try again!');
      // redirect('Purchase_Order');
      return $count;
    }
    $this->db->insert($table, $data);
  }

  function setDetPO($data, $table){
    $this->db->insert($table, $data);
  }

  public function deletePorder($data){
      $cekrows = $this->db->query('      SELECT * FROM po, detail_po dp WHERE dp.`NO_SPK`=po.`NO_SPK` AND po.NO_SPK = ? ;' , $data);

      if ($cekrows->num_rows() != 0){
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // $message = "tes";
        return 0;
      }else{
        $this->db->where(' NO_SPK', $data);
        $this->db->delete('po');
        return 1;
      }
  }

}
