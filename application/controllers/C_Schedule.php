<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Schedule extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Role', 'M_Schedule'));

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Schedule');
        if($this->menu_access["access"] == "denied"){
            redirect('C_Home?msg=you are not entitled to access the C_Schedule menu  !!!');
        }
        
        $this->role = $this->session->userdata('role');
    }

    function index(){
        $data["sch"] = $this->M_Schedule->get_schedule();
        $this->template->display("schedule/v_index", $data);
    }

    function simpan(){
        $day = $this->input->post("day");
        $time_start = $this->input->post("time_start");
        $time_end = $this->input->post("time_end");
        $doctor = $this->session->userdata('userid');
        $data = array(
            "doctor" => $doctor,
            "day" => $day,
            "time_start" => $time_start,
            "time_end" => $time_end

        );
        $this->M_Schedule-> simpan($data);

        redirect("C_Schedule");
    }
}