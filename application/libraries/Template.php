<?php
/**
 * 
 */
class Template{
	protected $_CI;
	function __construct(){
		$this->_CI=&get_instance();
	}

	function display($template,$data=null){
		$data['_header']= $this->_CI->load->view('template/header',$data, true);
		$data['_content']= $this->_CI->load->view($template,$data, true);
		$data['_footer']= $this->_CI->load->view('template/footer',$data, true);

		$this->_CI->load->view('/template.php',$data);
	}
}