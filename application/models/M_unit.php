<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_unit extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();

        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'            => $post['unit_name'],
        ];

        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'            => $post['unit_name'],
            'updated'         => date('Y-m-d H:i:s')
        ];

        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    function delete_unit($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}

/* End of file M_unit.php */
