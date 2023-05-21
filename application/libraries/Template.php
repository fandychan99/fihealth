<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
        $this->_CI->load->model('M_Menu');
    }
	
    function display($template, $data = null){		
        $data['_list_menu'] = $this->_CI->session->userdata('menu');

		$data['_header']=$this->_CI->load->view('template/v_header',$data,true);
		$data['_menu']=$this->_CI->load->view('template/v_menu',$data,true);
		$data['_content']=$this->_CI->load->view($template,$data,true);
		$data['_footer']=$this->_CI->load->view('template/v_footer',$data,true);
		$data['_script']=$this->_CI->load->view('template/v_script',$data,true);
        $data['_style']=$this->_CI->load->view('template/v_style',$data,true);
        $this->_CI->load->view('/template.php',$data);
    }
	
}