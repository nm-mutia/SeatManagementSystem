<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function getLokasi(){
		$query = "SELECT ID_LOKASI, NAMA_PERUSAHAAN, ALAMAT_LOKASI, KOTA FROM lokasi";
        $data = $this->db->query($query);
        return $data;
	}

	function countKtgLokHardware($id){
		$query = "SELECT COUNT(*) as jml
				FROM detail_po AS dp
				JOIN aset AS a ON a.id_da = dp.id_da
				WHERE a.id_lokasi = ? AND dp.kategori = 'Hardware'";
        $data = $this->db->query($query, array($id));
        return $data;
	}


	function countSubktgLokH($id){
		$query = "SELECT dp.SUB_KATEGORI, COUNT(*) AS jml
				FROM detail_po AS dp
				JOIN aset AS a ON a.id_da = dp.id_da
				WHERE a.id_lokasi = ? AND dp.kategori = 'Hardware'
				GROUP BY dp.sub_kategori";
        $data = $this->db->query($query, array($id));
        return $data;
	}


	// function countKtgLokSoftware($id){
	// 	$query = "SELECT SUM((CASE WHEN dp.qty_tersedia IS NOT NULL
	// 			    THEN dp.qty_tersedia
	// 			    ELSE 0 
	// 			END)) AS jml
	// 			FROM detail_po AS dp
	// 			LEFT JOIN aset AS a ON a.id_da = dp.id_da
	// 			WHERE a.id_lokasi = ? AND dp.kategori = 'Software'";
 //        $data = $this->db->query($query, array($id));
 //        return $data;
	// }

	// function countSubktgLokS($id){
	// 	$query = "SELECT dp.sub_kategori, SUM((CASE 
	// 			    WHEN dp.qty_tersedia IS NOT NULL
	// 			    THEN dp.qty_tersedia
	// 			    ELSE 0 
	// 			END)) AS jml
	// 			FROM detail_po AS dp
	// 			JOIN aset AS a ON a.id_da = dp.id_da
	// 			WHERE a.id_lokasi = ? AND dp.kategori = 'Software'
	// 			GROUP BY dp.sub_kategori";
 //        $data = $this->db->query($query, array($id));
 //        return $data;
	// }


}