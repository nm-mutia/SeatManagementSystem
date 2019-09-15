<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getLokasi(){
		$query = "SELECT p.ID_PERUSAHAAN, p.NAMA_PERUSAHAAN
						FROM perusahaan p
					";
        $data = $this->db->query($query);
        return $data;
	}

	function getLokasiKota($idp){
		$query = "SELECT l.ID_LOKASI as idlokasi, l.KOTAATAUKABUPATEN AS kota, l.PROVINSI
				FROM lokasi l
				JOIN detail_lokasi dl ON dl.id_lokasi = l.id_lokasi
				WHERE dl.id_perusahaan = ?";
        $data = $this->db->query($query, array($idp));
        return $data->result_array();
	}

	function countKtgLokHardware($id){
		$query = "SELECT COUNT(*) as jml
				FROM detail_po AS dp
				JOIN aset AS a ON a.id_da = dp.id_da
				WHERE a.id_perusahaan = ? AND dp.kategori = 'Hardware'";
        $data = $this->db->query($query, array($id));
        return $data;
	}


	function countSubktgLokH($id){
		$query = "SELECT dp.SUB_KATEGORI, COUNT(*) AS jml
				FROM detail_po AS dp
				JOIN aset AS a ON a.id_da = dp.id_da
				WHERE a.id_perusahaan = ? AND dp.kategori = 'Hardware'
				GROUP BY dp.sub_kategori";
        $data = $this->db->query($query, array($id));
        return $data;
	}
}
