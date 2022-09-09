<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sale extends CI_Controller {

    public function index()
    {
        $sale_data = $this->m_sale->data_sale()->result();

        $data = [
            'sale_data' => $sale_data
        ];


        $this->template->load('template', 'transaction/sale/sale_data', $data);

    }

}

/* End of file Data_sale.php */
