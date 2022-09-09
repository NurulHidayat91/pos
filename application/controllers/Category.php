<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }

    public function index()
    {
        $data['category'] = $this->m_category->get()->result();
        $this->template->load('template', 'product/category/category_data', $data);
    }

    function add()
    {
        $category   = new stdClass();
        $category->category_id = null;
        $category->name = null;
        $category->phone = null;
        $category->address = null;
        $category->description = null;

        $data = [
            'page'  => 'add',
            'row'   => $category
        ];
        $this->template->load('template', 'product/category/category_form', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_category->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_category->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('category');
    }

    function edit($id)
    {
        $query = $this->m_category->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $category
            ];
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
            echo "<script>window.location='" . site_url('category') . "';</script>";
        }
    }

    function delete($id)
    {
        $this->m_category->delete_category($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');

        }
        echo "<script>window.location='" . site_url('category') . "';</script>";
    }
}

/* End of file category.php */
