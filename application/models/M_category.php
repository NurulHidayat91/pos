<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();

        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'            => $post['category_name'],
        ];

        $this->db->insert('p_category', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'            => $post['category_name'],
            'updated'         => date('Y-m-d H:i:s')
        ];

        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    function delete_category($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}

/* End of file M_category.php */
