<?php

class M_Article extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->role = $this->session->userdata('role');
    }

    function get_all(){
        $query = "SELECT * FROM trn_article ORDER BY created_date DESC";

        return $this->db->query($query);
    }

    function get_by_id($id){
        $query = "SELECT * FROM trn_article where id = '$id' ";

        return $this->db->query($query);
    }

    function get_last(){
        $query = "SELECT * FROM trn_article ORDER BY created_date DESC limit 5";

        return $this->db->query($query);
    }

    function simpan($data){
        return $this->db->insert("trn_article", $data);
    }


}
