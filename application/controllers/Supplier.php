<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }
    

    public function index()
    {
        $data['supplier'] = $this->m_supplier->get()->result();
        $this->template->load('template', 'supplier/supplier_data', $data);
        
    }

    function add()
    {
        $supplier   = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;

        $data = [
            'page'  => 'add',
            'row'   => $supplier
        ];
        $this->template->load('template', 'supplier/supplier_form', $data);

    }

    public function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_supplier->add($post);
        }else if (isset($_POST['edit'])) {
            $this->m_supplier->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }

    function edit($id)
    {
        $query = $this->m_supplier->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $supplier
            ];
            $this->template->load('template', 'supplier/supplier_form', $data);

        }else {
            echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
            echo "<script>window.location='" . site_url('supplier') . "';</script>";
        }
    }

    function delete($id)
    {
        $this->m_supplier->delete_supplier($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            echo "<script>alert('Data tidak dapat dihapus (sudah berelasi)');</script>";
        }
        else {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
        
    }

}

/* End of file Supplier.php */
