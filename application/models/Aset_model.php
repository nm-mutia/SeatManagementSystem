<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aset_model extends CI_Model {
  public $image;

  public function flush(){
		$this->title = '';
		$this->image = '';
	}

  function __construct(){
      // Call the Model constructor
      parent::__construct();
  }

  function getAsetTersedia(){
    $q = $this->db->query('SELECT KATEGORI ,COUNT(KATEGORI) AS JUMLAH
      FROM detail_po po JOIN aset a ON po.`ID_DA` = a.`ID_DA`
      where status_aset = 1
      GROUP BY KATEGORI;');
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
    $q = $this->db->query('CALL get_asetkeseluruhandets(?, ?)' , array($id,$skat));
    return $q;
  }

  function getAsetTersediaDetail($id){
    $q = $this->db->query('CALL get_asettersediadetail(?)' , array($id));
    return $q;
  }

  function getAset(){
    $query = "SELECT a.sn AS SN, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES
      FROM aset AS a";
    $data = $this->db->query($query);
    return $data;
  }

  function getAsetAll(){
    $query = "SELECT a.sn as SN, a.id_da as ID_DA, a.ID_PERUSAHAAN, a.ID_LOKASI, a.checksum AS CHECKSUM, a.tipe AS TIPE, a.merk AS MERK, a.series AS SERIES, a.image AS IMAGE
      FROM aset AS a";
    $data = $this->db->query($query);
    return $data;
  }

  function detAsetSPK($id){
    $query = "SELECT a.sn AS 'SN', a.checksum AS 'CHECKSUM', a.tipe AS 'TIPE', a.merk AS 'MERK', a.series AS 'SERIES',
       p.nama_perusahaan AS 'NAMA_PERUSAHAAN', l.`KOTAATAUKABUPATEN` AS 'SITE' ,a.image AS 'IMAGE'
      FROM detail_po AS dpo
      JOIN aset AS a ON a.id_da = dpo.id_da
      JOIN perusahaan AS p ON a.id_perusahaan = p.id_perusahaan
      JOIN lokasi AS l ON l.ID_lokasi = a.id_lokasi
      WHERE dpo.id_da = ?;";
    $data = $this->db->query($query, array($id));
    return $data;
  }

  function getImage($id){
    $q = $this->db->get_where("aset", ['SN' => $id]);
		return $q->num_rows() > 0 ? $q->row()->IMAGE : '';
  }

  function setAset($data, $table, $sn){
    $query = $this->db->get_where($table, array(
            'SN' => $sn
            ));
    $count = $query->num_rows();
    if($count){
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

  //log
  function getlogMutasi(){
    $query = "SELECT * FROM LOG_MUTASI";
    $data = $this->db->query($query);
    return $data;
  }

  function getlogService(){
    $query = "SELECT * FROM LOG_SERVICE";
    $data = $this->db->query($query);
    return $data;
  }

  public function deleteAset($data){
    $cekrows = $this->db->query('SELECT * FROM detail_history WHERE sn = ?' , $data);
    if ($cekrows->num_rows() != 0){
      return 0;
    }else{
      $this->db->where('sn', $data);
      $this->db->delete('aset');
      return 1;
    }
  }

  public function getOneList($nama){
    $fields = $this->db->query('CALL getOneListAset(?)', array($nama));
    return $fields;
  }

  function upAset($data, $table, $sn){
    $this->db->where('SN', $sn);
    $this->db->update($table, $data);
  }

  public function getMerk($nip){
    $fields = $this->db->query('CALL c_merk(?)', array($nip));
    mysqli_next_result( $this->db->conn_id );
    return $fields->result_array();
  }

  public function getTipe($nip, $merk){
    $fields = $this->db->query('CALL c_tipe(?, ?)', array($nip, $merk));
    return $fields->result_array();
  }

  public function get_sn_mtsmodel($nip, $merk, $tipe, $seri){
    $fields = $this->db->query('CALL c_sn(?, ?, ?, ?)', array($nip, $merk, $tipe, $seri));
    return $fields->result_array();
  }
}
