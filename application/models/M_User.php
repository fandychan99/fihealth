<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_User extends CI_Model {
    private $tbluser = 'utl_user';
    private $id = 'utl_user.user_id';
    private $vwuser = 'vw_user';
    private $role = 'role_id';

    public function get_all(){
        return $this->db->get($this->vwuser)->result();
    }

    public function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->tbluser)->row();
    }

    public function register($data){
        if(!$this->db->insert($this->tbluser, $data)){
            return array("status" => "failed", "error" => $this->db->error());
        }else{
            $user_id = $data["user_id"];
            $role = $data["role_id"];
            $tbl = ($role == 2 ? "utl_user_doctor" : "utl_user_patient");
            $this->db->query("INSERT INTO $tbl (user_id) values ('$user_id')");
            return array("status" => "success", "error" => "");
        }

    }

    public function get_profile($id){
        if($this->session->userdata('role') == 2){
            $query = "SELECT * FROM vw_user_doctor where user_id = '$id'";
        }else{
            $query = "SELECT * FROM vw_user_patient where user_id = '$id'";
        }

        return $this->db->query($query)->row();
    }

    public function user_exist($id){

    }

    
}