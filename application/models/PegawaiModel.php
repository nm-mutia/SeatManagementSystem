<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model{
    // private $_table = "karyawan"; //nama tabel

    // private $NIK;
    // private $NAMA;
    // private $JOB_LEVEL;
    // private $PASSWORD;
    // public $image = "default.jpg";


    // public function rules()
    // {
    //     return [
    //         ['field' => 'name',
    //         'label' => 'Name',
    //         'rules' => 'required'],

    //         ['field' => 'price',
    //         'label' => 'Price',
    //         'rules' => 'numeric'],

    //         ['field' => 'description',
    //         'label' => 'Description',
    //         'rules' => 'required']
    //     ];
    // }
    public function getPegawai(){
        $query = "SELECT p.nip AS NIP, p.nama AS NAMA, p.job_level as JOB_LEVEL
          FROM pegawai AS p";
        $data = $this->db->query($query);
        return $data;
      }

    public function getAll(){
        $data = $this->db->query("SELECT * FROM pegawai");
        return $data->result_array();
    }

    // public function getById($nik){
    //     return $data = $this->db->get_where($this->_table, ["NIK" => $nik])->row();
    // }
}
