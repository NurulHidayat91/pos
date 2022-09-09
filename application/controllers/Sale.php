<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }


    public function index()
    {
        $customer = $this->m_customer->get()->result();
        $item = $this->m_item->get()->result();
        $cart = $this->m_sale->get_cart();
        $data      = [
            'customer' => $customer,
            'item'     => $item,
            'cart'     => $cart,
            'invoice'  => $this->m_sale->invoice_no(),
        ];

        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }

    // Membuat scan barcode barcode reader
    function get_item()
    {
        $barcode = $this->input->post('barcode');
        $item    = $this->m_item->get_barcode($barcode)->row();
        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true, "item" => $item);
            
        }else {
            $params = array("success" => false);
        }
        echo json_encode($params);
        
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {
            $item_id    = $this->input->post('item_id');
            
            $check_cart = $this->m_sale->get_cart(['t_cart.item_id' => $item_id]);
            if ($check_cart->num_rows() > 0) {
                $this->m_sale->update_cart_qty($post);
            }else{
                $this->m_sale->add_cart($post);
            }
           

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
                
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);

        }

        if (isset($_POST['edit_cart'])) {
            $this->m_sale->edit_cart($post);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
                
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);

        }

        if (isset($_POST['process_payment'])) {
            $sale_id = $this->m_sale->add_sale($post);
            $cart    = $this->m_sale->get_cart()->result();
            $row     = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                        'sale_id'           => $sale_id,
                        'item_id'           => $value->item_id,
                        'price'             => $value->cart_price,
                        'qty'               => $value->qty,
                        'discount_item'     => $value->discount_item,
                        'total'             => $value->total,
                    )
                );
            }
            $this->m_sale->add_sale_detail($row);
            $this->m_sale->del_cart(['user_id' => $this->session->userdata('userid')]);
 
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "sale_id" => $sale_id);
                
            }else {
                $params = array("success" => false);
            }
            echo json_encode($params);
            
        }
        
    }

    // load data keranjang
    public function cart_data()
    {
        $cart         = $this->m_sale->get_cart();
        $data['cart'] = $cart;
        $this->load->view('transaction/sale/cart_data', $data);
        
    }

    public function cart_del()
    {
        if (isset($_POST['cancel_payment'])) {
            $this->m_sale->del_cart(['user_id' => $this->session->userdata('userid')]);
        }else {
            $cart_id = $this->input->post('cart_id');
            $this->m_sale->del_cart(['cart_id' => $cart_id]);
        }
       
        
        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
            
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);

    }

    // CETAK INVOICE

    public function cetak($id)
    {
        $data = [
            'sale'             => $this->m_sale->get_sale($id)->row(),
            'sale_detail'      => $this->m_sale->get_sale_detail($id)->result(),
        ];
        $this->load->view('transaction/sale/receipt_print', $data);
        
    }

    public function del($id)
    {
        $this->m_sale->del_sale($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus');
            window.location='".site_url('report/sale')."';
            </script>";            
        } else {
            echo "<script>alert('Data gagal Dihapus');
            window.location='".site_url('report/sale')."';
            </script>";
        }
    }
    
}

/* End of file Sale.php */
