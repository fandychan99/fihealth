<?php

class M_Appointment extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
    }

    function get_all($userid){
        if($this->role == 2){
            $query = "SELECT * FROM vw_appointment_patient WHERE doctor = '$userid' and status = '1'";
        }else{
            $query = "SELECT * FROM vw_appointment_doctor WHERE patient = '$userid'";
        }

        return $this->db->query($query);
    }

    function get_dokter($namadokter, $specialist){
        $query = "SELECT * FROM vw_user_doctor where NAME like '%$namadokter%' ";
        if($specialist != ""){
            $query = $query."  AND spesialist = '$specialist'";
        }

        // echo $query;

        return $this->db->query($query);
    }

    function get_dokter_byid($id){
        $query = "SELECT * FROM vw_user_doctor where user_id = '$id'";
        // echo $query;
        return $this->db->query($query);
    }

    function get_jadwal_dokter_byid($id){
        $query = "SELECT a.`day`, a.tgl, count(b.`day`) as total from vw_day_doctor a LEFT join utl_jadwal_dokter b on a.`day` = b.`day` where b.doctor = '$id' GROUP BY a.`day`, a.tgl ORDER BY a.tgl";
        return $this->db->query($query);
    }

    function get_jadwal_dokter($jadwal, $dokter){
        $query = "SELECT a.*, b.id as booked FROM utl_jadwal_dokter a LEFT JOIN trn_appointment b on (a.id = b.slot_id and b.date_book = '$jadwal') where a.day = (SELECT DAYNAME('$jadwal')) AND a.doctor = '$dokter'  ";
        // echo $query;
        return $this->db->query($query);
    }

    function get_by_id($id){

    }

    function save($dokter, $tgl, $jadwal){
        $patient = $this->session->userdata('userid');
        $query = "INSERT INTO trn_appointment (patient,  doctor, slot_id, date_book, status,  created_by, created_date ) 
                                            VALUES ('$patient', '$dokter', '$jadwal', '$tgl', 1, '$patient', now())";
        return $this->db->query($query);
    }

    function change_status($st, $id){
        $query = "UPDATE trn_appointment SET status = $st where id = $id";
        return $this->db->query($query);
    }
}

?>