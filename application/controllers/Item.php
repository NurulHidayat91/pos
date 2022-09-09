<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }

    function get_ajax()
    {
        $list = $this->m_item->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->item_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = indo_currency($item->price);
            $row[] = $item->stock;
            $row[] = $item->image != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('item/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="' . site_url('item/del/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->m_item->count_all(),
            "recordsFiltered" => $this->m_item->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['item'] = $this->m_item->get()->result();
        $this->template->load('template', 'product/item/item_data', $data);
    }

    function add()
    {
        $item   = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null;
        $item->price = null;
        $item->category_id = null;

        $query_category = $this->m_category->get();
        $query_unit = $this->m_unit->get();
        $unit[null] = '- Pilih -';
        foreach ($query_unit->result() as $value) {
            $unit[$value->unit_id] = $value->name;
        }

        $data = [
            'page'      => 'add',
            'row'       => $item,
            'category'  => $query_category,
            'unit'      => $unit, 'selectedunit' => null,
        ];
        $this->template->load('template', 'product/item/item_form', $data);
    }

    public function proses()
    {
        $config['upload_path']          = './uploads/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {

            //CHECK BARCODE
            if ($this->m_item->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/add');
            } else {


                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->m_item->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error =  $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->m_item->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->m_item->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/edit/' . $post['id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $item = $this->m_item->get($post['id'])->row();
                        if ($item->image != null) {
                            $target_file = './uploads/product/' . $item->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->m_item->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error =  $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->m_item->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        }
    }

    function edit($id)
    {
        $query = $this->m_item->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->m_category->get();
            $query_unit = $this->m_unit->get();
            $unit[null] = '- Pilih -';
            foreach ($query_unit->result() as $value) {
                $unit[$value->unit_id] = $value->name;
            }

            $data = [
                'page'      => 'edit',
                'row'       => $item,
                'category'  => $query_category,
                'unit'      => $unit, 'selectedunit' => $item->unit_id,
            ];
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
            echo "<script>window.location='" . site_url('item') . "';</script>";
        }
    }

    function delete($id)
    {
        $item = $this->m_item->get($id)->row();
        if ($item->image != null) {
            $target_file = './uploads/product/' . $item->image;
            unlink($target_file);
        }
        $this->m_item->delete_item($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        echo "<script>window.location='" . site_url('item') . "';</script>";
    }

    function barcode_qrcode($id)
    {
        $data['item'] = $this->m_item->get($id)->row();
        $this->template->load('template', 'product/item/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['item'] = $this->m_item->get($id)->row();

        $html = $this->load->view('product/item/barcode_print', $data, true);

        $this->fungsi->pdfGenerator($html, 'barcode-' . $data['item']->barcode, 'A4', 'landscape');
    }

    function qrcode_print($id)
    {
        $data['item'] = $this->m_item->get($id)->row();

        $html = $this->load->view('product/item/qrcode_print', $data, true);

        $this->fungsi->pdfGenerator($html, 'barcode-' . $data['item']->barcode, 'A4', 'potrait');
    }
}

/* End of file item.php */
