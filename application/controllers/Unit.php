<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function index()
    {
        $data['unit'] = $this->m_unit->get()->result();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    function add()
    {
        $unit   = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $unit->phone = null;
        $unit->address = null;
        $unit->description = null;

        $data = [
            'page'  => 'add',
            'row'   => $unit
        ];
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_unit->add($post);
        } else if (isset($_POST['edit'])) {
            $this->m_unit->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('unit');
    }

    function edit($id)
    {
        $query = $this->m_unit->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                'page'  => 'edit',
                'row'   => $unit
            ];
            $this->template->load('template', 'product/unit/unit_form', $data);
        } else {
            echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
            echo "<script>window.location='" . site_url('unit') . "';</script>";
        }
    }

    function delete($id)
    {
        $this->m_unit->delete_unit($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');

        }
        echo "<script>window.location='" . site_url('unit') . "';</script>";
    }
}

/* End of file unit.php */
