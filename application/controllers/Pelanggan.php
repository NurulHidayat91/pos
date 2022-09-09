<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }

    public function index()
    {
        $data['customer'] = $this->m_customer->get()->result();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    function get_json()
    {
        $this->load->library('datatables');
        $this->datatables->add_column('no', 'ID-$1', 'customer_id');
        $this->datatables->select('customer_id, name, gender, phone, address,');
        $this->datatables->add_column('action', anchor('customer/edit/$1', 'Update', array('class' => 'btn btn-primary btn-xs'))." ".
            anchor('customer/delete/$1', 'Delete', array('class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Yakin ingin hapus?\')')), 'customer_id'
    );

    $this->datatables->from('customer');
    return print_r($this->datatables->generate());
    }

    function add()
    {
        $customer   = new stdClass();
        $customer->customer_id = null;
        $customer->name = null;
        $customer->gender = null;
        $customer->phone = null;
        $customer->address = null;

        $data = [
            'page'  => 'add',
            'row'   => $customer
        ];
        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_customer->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_customer->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "';</script>";
    }

    function edit($id)
    {
        $query = $this->m_customer->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $customer
            ];
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
            echo "<script>window.location='" . site_url('customer') . "';</script>";
        }
    }

    function delete($id)
    {
        $this->m_customer->delete_customer($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "';</script>";
    }
}

/* End of file customer.php */
