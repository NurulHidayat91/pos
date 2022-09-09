<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
      
    }
    
    // public function index()
    // {
        
    // }

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->m_user->login($post);
            ?>
            <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/sweetalert2.min.css">
            <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/animate.min.css">

            <script src="<?= base_url() ?>assets/sweetalert2/js/sweetalert2.min.js"></script>
            <body></body>
            <?php
            if ($query->num_rows() > 0) {
                $row    = $query->row();
                $params =  array(
                    'userid'   => $row->user_id,
                    'level'    => $row->level
                );

                $this->session->set_userdata($params);
                ?>

                <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: 'Selamat Login Berhasil',
                    showClass: {
                        popup: 'animate__animated animate__heartBeat'
                        }
                    }).then((result)=>{
                        window.location='<?=site_url('dashboard')?>';

                    })
                
               
                </script>
                <?php 
            } else {
                ?>

                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Failure',
                    text: 'Login Gagal, Username dan password salah',
                    showClass: {
                    popup: 'animate__animated animate__heartBeat'
                    }
                    
                        }).then((result)=>{
                        window.location='<?=site_url('auth/login')?>';

                    })
               
                </script>
                <?php
            }
        }
    }

    function logout()
    {
        $params = array(
            'userid',
            'level'
        );
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }

}

/* End of file Auth.php */
