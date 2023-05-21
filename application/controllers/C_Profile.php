<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_User', 'M_Profile', 'M_Specialist', 'M_Chat'));
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('form');

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Profile');
        if ($this->menu_access["access"] == "denied") {
            redirect('C_Home?msg=you are not entitled to access the Profile menu !!!');
        }

        $this->role = $this->session->userdata('role');
    }

    function index()
    {
        $data["data_user"] = $this->M_User->get_profile($this->session->userdata('userid'));
        $data["list_specialist"] = $this->M_Specialist->select_get_all();
        if ($this->role == 2) {
            $this->template->display("profile/v_index_doctor", $data);
        } else {
            $data["isi_chart"] = $this->M_Profile->get_chart($this->session->userdata('userid'));
            $data["history_consul"] = $this->M_Chat->get_consul_user($this->session->userdata('userid'));
            $this->template->display("profile/v_index_patient", $data);
        }
    }

    function get_consul_byid(){
        $id = $this->input->get("id");
        $data["isi_consul"] = $this->M_Chat->get_consul_byid(decrypt_url($id));

        $this->load->view("profile/v_ajax_consul", $data);
    }

    function update_profile_doctor()
    {
        $spesialist = $this->input->post("spesialist");
        $last_study = $this->input->post("last_study");
        $about = $this->input->post("about");
        $gelar = $this->input->post("gelar");

        $data = array(
            "spesialist" => $spesialist,
            "last_study" => $last_study,
            "about" => $about,
            "gelar" => $gelar
        );

        $this->M_Profile->update_data($data);
        if ($this->M_Profile->update_data($data)) {
            redirect("C_Profile?msg=success");
        } else {
            redirect("C_Profile?msg=failed");
        }
    }

    function update_profile_patient()
    {
        $sex = $this->input->post("sex");
        $born = $this->input->post("born");
        $weight = $this->input->post("weight");
        $height = $this->input->post("height");
        $bloodpressure = $this->input->post("bloodpressure");
        $heartrate = $this->input->post("heartrate");
        $cholesterol = $this->input->post("cholesterol");
        $bloodglucose = $this->input->post("bloodglucose");

        $data = array(
            "sex" => $sex,
            "born" => $born,
            "weight" => $weight,
            "height" => $height,
            "bloodpressure" => $bloodpressure,
            "heartrate" => $heartrate,
            "cholesterol" => $cholesterol,
            "bloodglucose" => $bloodglucose
        );

        if ($this->M_Profile->update_data($data)) {
            redirect("C_Profile?msg=success");
        } else {
            redirect("C_Profile?msg=failed");
        }
    }

    public function do_upload()
    {
        $config['upload_path'] = './assets/images/user/'; // Tentukan direktori penyimpanan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
        $config['max_size'] = 2048; // Batasan ukuran file (dalam kilobyte)

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            // Jika upload gagal, tampilkan pesan error
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            // Jika upload berhasil, dapatkan informasi file yang diunggah
            $data = $this->upload->data();
            $data_simpan = array(
                "name" => $this->input->post("nama_user"),
                "image" => $data['file_name']
            );
            
            $this->session->set_userdata('user_image', $data['file_name']);

            if ($this->M_Profile->update_data_general($data_simpan)) {
                redirect("C_Profile?msg=success");
            } else {
                redirect("C_Profile?msg=failed");
            }
        }
    }
}
