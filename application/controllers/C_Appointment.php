<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Appointment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Appointment', 'M_Role', 'M_Specialist'));

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Appointment');
        if($this->menu_access["access"] == "denied"){
            redirect('C_Home?msg=you are not entitled to access the Appointmen menu  !!!');
        }
        
        $this->role = $this->session->userdata('role');
    }

    function index(){
        $userid = $this->session->userdata('userid');
        $array_status = array("1" => "Open", "2" => "Approve", "3" => "Now", "4" => "Closed", "5" => "Reject");
        $data["status"] = $array_status;
        $data["list_appointment"] = $this->M_Appointment->get_all($userid);
        if($this->role == 2){
            $this->template->display('appointment/v_index_doctor', $data);
        }else{
            $this->template->display('appointment/v_index_patient', $data);
        }

    }

    function form(){
        $data["list_specialist"] = $this->M_Specialist->select_get_all();
        $this->template->display("appointment/v_form", $data);
    }

    function get_dokter(){
        $specialist = $this->input->get("specialist");
        $namadokter = $this->input->get("namadokter");
        
        $data['_lstdokter'] = $this->M_Appointment->get_dokter($namadokter, $specialist);
        $this->load->view("appointment/v_ajax_get_doctor", $data);

    }

    function get_apointment_ajaxjadwal(){
        $jadwal = $this->input->get("jadwal");
        $dokter = $this->input->get("dokter");

        $data["jadwal_dokter"] = $this->M_Appointment->get_jadwal_dokter($jadwal, $dokter)->result_array();
        
        $this->load->view("appointment/v_ajax_schedule", $data);
    }

    function get_appointment_ajax(){
        $id = $this->input->get("id");

        $data["row"] = $this->M_Appointment->get_dokter_byid($id)->row_array();
        $data["jadwal_dokter"] = $this->M_Appointment->get_jadwal_dokter_byid($id)->result_array();
        
        $this->load->view("appointment/v_ajax_apointment", $data);
    }

    function save_appoinment(){
        $jadwal  = $this->input->post("jadwal");
        $dokter = $this->input->post("dokter");
        $tgl = $this->input->post("tgl");

        if($this->M_Appointment->save($dokter, $tgl, $jadwal)){
            $array = array("status" => "success", "message" => "Save Data Success !");
        }else{
            $array = array("status" => "failed", "message" => "Failed to save data !");
        }

        echo json_encode($array);
    }

    function change_status(){
        $st = $this->input->get("status");
        $id = $this->input->get("id");
        if($this->M_Appointment->change_status(decrypt_url($st), decrypt_url($id))){
            redirect("C_Appointment?msg=success");
        }else{
            redirect("C_Appointment?msg=failed");
        }
        
    }
}

?>