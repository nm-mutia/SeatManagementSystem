<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawanModel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data["content"] = $this->karyawanModel->getAll();
        // $this->load->view("admin/product/list", $data);
    }

    public function add()
    {
        // $karyawan = $this->karyawanModel;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());

        // if ($validation->run()) {
        //     $karyawan->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        // $this->load->view("admin/product/new_form");
    }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('admin/products');
       
        // $karyawan = $this->product_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($product->rules());

        // if ($validation->run()) {
        //     $karyawan->update();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        // $data["product"] = $product->getById($id);
        // if (!$data["product"]) show_404();
        
        // $this->load->view("admin/product/edit_form", $data);
    }

    public function delete($id=null)
    {
        // if (!isset($id)) show_404();
        
        // if ($this->product_model->delete($id)) {
        //     redirect(site_url('admin/products'));
        // }
    }
}