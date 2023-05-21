<?php

class M_Chat extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
    }

    function get_all($userid){
        if($this->role == 2){
            $query = "SELECT * FROM vw_appointment_patient WHERE doctor = '$userid' and status = '2' and date_book = DATE_FORMAT(NOW(), '%Y-%m-%d') ";
        }else{
            $query = "SELECT * FROM vw_appointment_doctor WHERE patient = '$userid' and status = '2' and date_book = DATE_FORMAT(NOW(), '%Y-%m-%d') ";
        }

        return $this->db->query($query);
    }

    function get_history($userid){
        $query = "SELECT * FROM vw_appointment_patient WHERE patient = '$userid' and status not in ('1', '4') and date_book <  DATE_FORMAT(NOW(), '%Y-%m-%d') ";
        return $this->db->query($query);
    }

    function get_chat($id){
        $query = "SELECT * FROM trn_chat WHERE appointment_id = '$id' ";
        return $this->db->query($query);
    }

    function insert_chat($data){
        return $this->db->insert("trn_chat", $data);
    }

    function simpan_diagnose($data){
        return $this->db->insert("utl_diagnosa_patient", $data);
    }

    function get_consul_user($id){
        $query = "SELECT * FROM vw_diagnosa WHERE userid = '$id'";

        return $this->db->query($query);
    }

    function get_consul_byid($id){
        $query = "SELECT * FROM vw_diagnosa WHERE id = '$id'";

        return $this->db->query($query);
    }
}