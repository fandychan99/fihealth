<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Chat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Chat', 'M_Role', 'M_Profile'));

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Chat');
        if($this->menu_access["access"] == "denied"){
            redirect('C_Home?msg=you are not entitled to access the Appointmen menu  !!!');
        }
        
        $this->role = $this->session->userdata('role');
    }

    function index(){
        $data["lst_konsultasi"] = $this->M_Chat->get_all($this->session->userdata('userid'));
        $data["role"] = $this->role;
        // if($this->role == 2){
        //     $this->template->display('chat/v_index_doctor', $data);
        // }else{
        //     $this->template->display('chat/v_index_patient', $data);
        // }

        $this->template->display('chat/v_index', $data);
    }

    function chat(){
        $id = $this->input->get("index");
        $data["id"] = $id;
        $data["role"] = $this->role;
        $data["data_user"] = $this->M_Profile->get_profile(decrypt_url($id))->row();
        // echo "ini";
        // var_dump($data["data_user"]);
        $this->template->display('chat/v_chat', $data);
    }

    function isi_chat(){
        $id = $this->input->get("id");
        $data["id"] = "ini id : ".$id;
        $data["isi_chat"] = $this->M_Chat->get_chat(decrypt_url($id))->result_array();
        
        $this->load->view('chat/v_ajax_chat', $data);
    }

    function kirim(){
        $pesan = $this->input->post("pesan");
        $id = $this->input->post("id");
        $data = array ( "appointment_id" => decrypt_url($id), "user_id" => $this->session->userdata('userid'),  "chat_text" => $pesan );

        $this->M_Chat->insert_chat($data);
    }

    function save_diagnose(){
        $id_appointment = $this->input->post("id_appointment"); 
        $id_passein = $this->input->post("id_passein");
        $diagnose = $this->input->post("diagnose");
        $recipe = $this->input->post("recipe");
        $theraphy = $this->input->post("theraphy");

        $data = array(
            "id_appointment" => $id_appointment,
            "userid" => $id_passein,
            "date_consul" => date("Y-m-d"),
            "diagnose" => $diagnose,
            "recipe" => $recipe,
            "therapy" => $theraphy,
            "created_by" => $this->session->userdata('userid'),
            "craeted_date" => date("Y-m-d H:i:s")
        );

        $this->M_Chat->simpan_diagnose($data);

        redirect('C_Chat');
    }

    
    
}