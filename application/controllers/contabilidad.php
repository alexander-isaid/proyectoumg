<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contabilidad
 *
 * @author Isaid Alexander Reyes Requenas
 */
class contabilidad extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('publico/index');
    }

}

?>
