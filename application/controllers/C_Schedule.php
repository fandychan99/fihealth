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
        $id = $this->input->get("id");
        $data["sch_byid"] = $this->M_Schedule->get_schedule_byid(decrypt_url($id));
        $data["sch"] = $this->M_Schedule->get_schedule();
        $this->template->display("schedule/v_index", $data);
    }

    function simpan(){
        $id = $this->input->post("id");
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

        $this->M_Schedule-> simpan($data, $id);

        redirect("C_Schedule");
    }

    function delete(){
        $id = decrypt_url($this->input->get("id"));

        $query = "DELETE FROM utl_jadwal_dokter where id = '$id'";

        $hapus = $this->db->query($query);

        if($hapus){
            redirect("C_Schedule?msg=Article Has Been Deleted ");
        }else{
            redirect("C_Schedule?msg=Article Failed to Deleted ");
        }
    }
}