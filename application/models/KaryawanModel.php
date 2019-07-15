<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model{
    private $_table = "karyawan"; //nama tabel

    public $NIK;
    public $NAMA;
    public $JOB_LEVEL;
    public $PASSWORD;
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

    public function getAll(){
        $data = $this->db->query("SELECT * FROM karyawan");
        return $data->result_array();
    }

    public function getById($nik){
        return $data = $this->db->get_where($this->_table, ["NIK" => $nik])->row();
    }

    public function set(){
        $post = $this->input->post();
        $this->NIK = uniqid();
        $this->NAMA = $post["nama"];
        $this->JOB_LEVEL = $post["joblevel"];
        $this->PASSWORD = md5($post["password"]);
        $this->db->insert($this->_table, $this);
        // return $data->result_array();
    }

    public function delete($nik){
        return $data = $this->db->delete($this->_table, array("NIK" => $nik));
    }

    public function update(){
        $post = $this->input->post();
        $this->NIK = uniqid();
        $this->NAMA = $post["nama"];
        $this->JOB_LEVEL = $post["joblevel"];
        $this->PASSWORD = md5($post["password"]);
        $this->db->update($this->_table, $this, array('NIK' => $post['nik']));
        // return $data->result_array();
    }
}
