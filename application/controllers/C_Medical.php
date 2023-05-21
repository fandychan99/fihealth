<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Medical extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_User', 'M_Role'));

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Medical');
        if($this->menu_access["access"] == "denied"){
            redirect('C_Home?msg=anda tidak berhak mengakses menu appintment !!!');
        }
        
        $this->role = $this->session->userdata('role');
    }
    

    function index(){

    }

    function form_medical(){

    }
    
    function simpan_medical(){

    }


}