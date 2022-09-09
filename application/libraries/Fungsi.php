<?php

Class Fungsi
{
    protected $ci;
    
    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login() 
    {
        $this->ci->load->model('m_user');
        $user_id     = $this->ci->session->userdata('userid');
        $user_data   = $this->ci->m_user->get($user_id)->row();
        return $user_data;
    }

    function pdfGenerator($html, $filename, $paper, $orientation)
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    function count_item()
    {
        $this->ci->load->model('m_item');
        return $this->ci->m_item->get()->num_rows();
    }

    function count_supplier()
    {
        $this->ci->load->model('m_supplier');
        return $this->ci->m_item->get()->num_rows();
    }

    function count_customer()
    {
        $this->ci->load->model('m_customer');
        return $this->ci->m_item->get()->num_rows();
    }

    function count_user()
    {
        $this->ci->load->model('m_user');
        return $this->ci->m_item->get()->num_rows();
    }
    
}