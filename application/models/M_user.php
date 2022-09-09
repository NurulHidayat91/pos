<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();

        return $query ;
    }

    function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
            
        }
        $query = $this->db->get();

        return $query;
        
    }

    function add($post)
    {
        $params['name']     = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address']  = $post['alamat'];
        $params['level']    = $post['level'];

        $this->db->insert('user', $params);

    }

    function edit($post)
    {
        $params['name']     = $post['fullname'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);

        }
        $params['address']  = $post['alamat'];
        $params['level']    = $post['level'];

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);

    }


    function delete_user($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
        
    }

}

/* End of file M_user.php */
