<?php
/**
 *
 */
class Example extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('example_model');

	}
	public function index() {
		// $user = $this->session->userdata['user'];
		$this->load->view('main/example_post');

	}
	public function adddetail() {
		$params = $this->input->post('txt_content');
		$addMake = $this->example_model->add_ex($params);
		redirect('example');
	}
	function editor($path, $width) {
		//Loading Library For Ckeditor
		$this->load->library('ckeditor');
		$this->load->library('ckFinder');
		//configure base path of ckeditor folder
		$this->ckeditor->basePath = base_url() . 'js/ckeditor/';
		$this->ckeditor->config['toolbar'] = 'Full';
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = $width;
		//configure ckfinder with ckeditor config
		$this->ckfinder->SetupCKEditor($this->ckeditor, $path);
	}
}