

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

    function get_schedule_byid($id){
        
        $query = "SELECT * FROM utl_jadwal_dokter where id = '$id'";
        return $this->db->query($query)->row();
    }


    function simpan($data, $id){
        if($id == 0){
            return $this->db->insert("utl_jadwal_dokter", $data);
        }else{
            $this->db->where("id", $id);
            return $this->db->update("utl_jadwal_dokter", $data);
        }
        
    }

}