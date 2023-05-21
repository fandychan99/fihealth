<?php

class M_Specialist extends CI_Model
{
    private $tbl1 = 'mst_ruangan';

    function __construct()
    {
        parent::__construct();
    }

    function get_all(){
        return $this->db->query("SELECT * FROM utl_spesialis_doctor");
    }

    function select_get_all(){ 
        $this->db->select("id, string as nama");
        $this->db->from("utl_spesialis_doctor");
        $sql = $this->db->get();
        if ($sql->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql->result_array() as $row) {
                $result[$row['id']] = ucwords(strtoupper($row['nama']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }


   
}