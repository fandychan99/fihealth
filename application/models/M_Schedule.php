

<?php

class M_Schedule extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
    }

    function get_schedule(){
        $id = $this->session->userdata('userid');
        $query = "SELECT * FROM utl_jadwal_dokter where doctor = '$id' order by day";
        // echo $query;
        return $this->db->query($query)->result();
    }

    function simpan($data){
        return $this->db->insert("utl_jadwal_dokter", $data);
    }

}