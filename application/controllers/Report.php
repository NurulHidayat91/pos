<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        check_not_login();

        check_admin();
    }


    public function sale()
    {
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, true);
            $this->session->set_userdata('search', $post);
        }else {
            $post = $this->session->userdata('search');
        }

      
        $config['base_url'] = site_url('report/sale');
        $config['total_rows'] = $this->m_sale->get_sale_pagination()->num_rows();
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['customer'] = $this->m_customer->get()->result();
        $data['row'] = $this->m_sale->get_sale_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('template', 'report/sale_report', $data);
    }

    public function sale_product($sale_id)
    {
        $detail =  $this->m_sale->get_sale_detail($sale_id)->result();
        echo json_encode($detail);
    }
}

/* End of file Report.php */
