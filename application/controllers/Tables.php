<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        # code...
        $this->load->view('v_tables');
    }

}

/* End of file: Tables.php */
