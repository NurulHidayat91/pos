<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }
    
    public function index()
    {

        $data['user']   = $this->m_user->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules(
            'passconf',
            'Confirmasi Password',
            'required|matches[password]',
            array(
                'matches'      => '%s tidak sesuai dengan password',
            )
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');

        $this->form_validation->set_message('required', '%s Harus diisi');
        $this->form_validation->set_message('min_length', '%s Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s Sudah Ada');
        $this->form_validation->set_error_delimiters('<span class="text text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_user->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }


    function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules(
                'password',
                'Confirmasi Password',
                'matches[password]',
                array(
                    'matches'      => '%s tidak sesuai dengan password',
                )
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Confirmasi Password',
                'matches[password]',
                array(
                    'matches'      => '%s tidak sesuai dengan password',
                )
            );
        }

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');

        $this->form_validation->set_message('required', '%s Harus diisi');
        $this->form_validation->set_message('min_length', '%s Minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s Sudah Ada');
        $this->form_validation->set_error_delimiters('<span class="text text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query   = $this->m_user->get($id);
            if ($query->num_rows() > 0) {
                $data['user']  = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);

            }else{
                echo "<script>alert('Data tidak berhasil Ditemukan');</script>";
                echo "<script>window.location='" . site_url('user') . "';</script>";

            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_user->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil diupdate');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    function username_check()
    {
        $post  = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
                $this->form_validation->set_message('username_check', '%s Sudah digunakan!!');
                return false;
        }else {
            return TRUE;
        }

    }

    function delete_user()
    {
        $id = $this->input->post('user_id');
        $this->m_user->delete_user($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }
}

/* End of file User.php */
