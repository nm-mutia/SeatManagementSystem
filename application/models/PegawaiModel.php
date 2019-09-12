<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model{
    public function getPegawai(){
        $query = "SELECT p.nip AS NIP, p.nama AS NAMA, p.job_level as JOB_LEVEL
          FROM pegawai AS p";
        $data = $this->db->query($query);
        return $data;
    }

    public function getPegawaiById($nip){
        $query = "SELECT p.nip AS NIP, p.nama AS NAMA
          FROM pegawai AS p
          where p.nip = ?";
        $data = $this->db->query($query, array($nip));
        return $data;
    }

    public function getAll(){
        $data = $this->db->query("SELECT * FROM pegawai");
        return $data->result_array();
    }

    //history
    public function getHistoryPegawai($nip){
        $query = "SELECT SN, TIPE, MERK, SERIES, `TANGGAL PINJAM`, `TANGGAL TENGGAT`, `TANGGAL KEMBALI`, KONDISI, STATUS  
                FROM get_history_by g 
                WHERE g.nip = ? and g.status = 'Kembali'";
        $data = $this->db->query($query, array($nip));
        return $data;
    }

    public function getAsetPegawai($nip){
        $query = "SELECT SN, TIPE, MERK, SERIES, `TANGGAL PINJAM`, `TANGGAL TENGGAT`, STATUS  
                FROM get_history_by g 
                WHERE g.nip = ? and g.status != 'Kembali'";
        $data = $this->db->query($query, array($nip));
        return $data;
    }

    public function getTenggatPegawai($nip){
        $query = "SELECT SN, TIPE, MERK, SERIES, `TANGGAL PINJAM`, `TANGGAL TENGGAT`, STATUS  
                FROM get_history_by g 
                WHERE g.nip = ? AND g.`TANGGAL KEMBALI` IS NULL AND g.`TANGGAL TENGGAT` <= CURDATE()";
        $data = $this->db->query($query, array($nip));
        return $data;
    }

    public function countKtg($nip, $ktg){
        $query = "SELECT COUNT(*) as jml
                FROM get_history_by g
                JOIN aset a ON a.sn = g.sn
                JOIN detail_po d ON d.id_da = a.id_da
                WHERE g.nip = ? AND d.kategori = ?";
        $data = $this->db->query($query, array($nip, $ktg));
        return $data;
    }
}
