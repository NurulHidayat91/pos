<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_sale extends CI_Model
{

    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) as invoice_no FROM t_sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query =  $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            $row = $query->row();
            $n   = ((int)$row->invoice_no) + 1;
            $no  = sprintf("%'.04d", $n);
        } else {
            $no  = "0001";
        }

        $invoice = "DP" . date('ymd') . $no;
        return $invoice;
    }

    public function add_cart($post)
    {
        $sql   = "SELECT MAX(cart_id) AS cart_no FROM t_cart";
        $query = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = [
            'cart_id'             => $car_no,
            'item_id'             => $post['item_id'],
            'price'               => $post['price'],
            'qty'                 => $post['qty'],
            'total'               => $post['price'] * $post['qty'],
            'user_id'             => $this->session->userdata('userid')
        ];


        $this->db->insert('t_cart', $params);
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, p_item.name AS item_name, t_cart.price as cart_price');
        $this->db->from('t_cart');
        $this->db->join('p_item', 't_cart.item_id = p_item.item_id', 'left');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();

        return $query;
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE t_cart SET price = '$post[price]',
                qty = qty + $post[qty],
                total = '$post[price]' * qty
                WHERE item_id = '$post[item_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('t_cart');
    }

    public function edit_cart($post)
    {
        $params = [
        'price'             => $post['price'],
        'qty'               => $post['qty'],
        'discount_item'     => $post['discount'],
        'total'             => $post['total'],
        ];

        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('t_cart', $params);
    }

    public function add_sale($post)
    {
        $params = [
            'invoice'       => $this->invoice_no(),
            'customer_id'   => $post['customer_id'] == '' ? null : $post['customer_id'],
            'total_price'   => $post['subtotal'],
            'discount'      => $post['discount'],
            'final_price'   => $post['grandtotal'],
            'cash'          => $post['cash'],
            'remaining'     => $post['change'],
            'note'          => $post['note'],
            'date'          => $post['date'],
            'user_id'       => $this->session->userdata('userid'),
        ];

        $this->db->insert('t_sale', $params);
        return $this->db->insert_id();
    }

    public function add_sale_detail($params)
    {
        $this->db->insert_batch('t_sale_detail', $params);
        
    }

    public function get_sale($id = null)
    {
        $this->db->select('*, customer.name as customer_name, user.username as user_name, t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 't_sale.user_id = user.user_id', 'left');
        
        if ($id != null) {
            $this->db->where('sale_id', $id);
            
        }
        $this->db->order_by('date', 'desc');
        
        $query = $this->db->get();
        return $query;        
        
    }

    public function get_sale_pagination($limit = null, $start = null)
    {
        $post = $this->session->userdata('search');

        $this->db->select('*, customer.name as customer_name, user.username as user_name, t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 't_sale.user_id = user.user_id', 'left');

        if(!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("t_sale.date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if(!empty($post['customer'])) {
            if($post['customer'] == 'null') {
                $this->db->where("t_sale.customer_id IS NULL");
            } else {
                $this->db->where("t_sale.customer_id", $post['customer']);
            }
        }
        if(!empty($post['invoice'])) {
            $this->db->like("invoice", $post['invoice']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('date', 'desc');
        
        
        $query = $this->db->get();
        return $query;        
        
    }


    public function get_sale_detail($sale_id = null)
    {
        $this->db->select('*, t_sale_detail.price as detail_price');
        $this->db->from('t_sale_detail');
        $this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id', 'left');
        if ($sale_id != null) {
            $this->db->where('t_sale_detail.sale_id', $sale_id);
            
        }
        $query = $this->db->get();
        return $query; 
    }

    public function del_sale($id)
    {
        $this->db->where('sale_id', $id);
        $this->db->delete('t_sale');
        
        
    }

    function data_sale()
    {
        $this->db->select('t_cart.*, p_item.name as item_name, user.name as name_user');
        $this->db->select('(SELECT SUM(t_cart.qty)) as sold');
        $this->db->select('(SELECT SUM(t_cart.price)) as total_price, (SELECT SUM(t_cart.total)) as total_belanja');
        $this->db->from('t_cart');
        $this->db->join('p_item', 't_cart.item_id = p_item.item_id', 'left');
        $this->db->join('user', 't_cart.user_id = user.user_id', 'left');
        $this->db->group_by('user_id');
        


        return $this->db->get();
        
        
        
        
    }
}

/* End of file M_sale.php */
