<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Article extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Article'));
        $this->load->library('upload');
        $this->load->helper('url');

        if (!$this->session->userdata('userid')) {
            redirect('C_Auth');
        }

        $this->menu_access = $this->user_access->get_access('C_Article');
        if($this->menu_access["access"] == "denied"){
            redirect('C_Home?msg=anda tidak berhak mengakses menu appintment !!!');
        }
        
        $this->role = $this->session->userdata('role');
    }

    function index(){
        $data["list_article"] = $this->M_Article->get_all();
        $this->template->display("article/v_index", $data);
    }

    function add_article(){
        $data["art"] = 1;
        $this->template->display("article/v_add", $data);
    }

    function read_article(){
        $id = $this->uri->segment(3);
        $data["article"] = $this->M_Article->get_by_id($id)->row_array();
        $data["last5"] = $this->M_Article->get_last()->result_array();
        $this->template->display("article/v_detail", $data);
    }

    function simpan_article(){
        $title = $this->input->post("title");
        $highlight = $this->input->post("highlight");
        $content = $this->input->post("contents");
        $gambar = $this->input->post("gambar");

        $data = array("title" => $title, "part_content" => $highlight , "content" =>  $content, "create_by" =>$this->session->userdata('userid'), "image" => $gambar);

        $this->M_Article->simpan($data);

        redirect('C_Article/index');


    }

    function upload_image() {
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/news/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                var_dump($this->upload->display_errors());
                // return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/news/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/images/news/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/news/'.$data['file_name'];
            }
        }else{
            echo "kosong";
        }
    }

    // Delete image Summernote
    function delete_image() {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

}