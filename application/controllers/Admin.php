<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->model('admin/Modeladmin', 'admin');
		$this->load->model('admin/Modelproject', 'project');

	}

	public function index() {
		redirect('admin/login', 'refresh');
	}

	public function login() {
//        $ci = & get_instance();

		$logged_in_status = $this->session->userdata('logged_in_status');
		if ($logged_in_status) {
			redirect("project");
//            echo site_url("vehicle");
			//             $this->load->view('vehicle');
		}
		$data['project'] = $this->project->project();
		$this->load->view("admin/header");
//		$this->load->view("admin/navigation");
		$this->load->view("admin/login", $data);
		$this->load->view("admin/footer");
	}

	public function validateUserCredentials() {
		$param['username'] = $this->input->get_post('username', TRUE);
		$param['password'] = $this->input->get_post('password', TRUE);

		$response = $this->admin->validateUserCredentials($param);

		$this->load->view("admin/header");
		$this->load->view("admin/navigation");

		if ($response === FALSE) {
			$this->session->set_flashdata('err_msg', 'Invalid username and password');
			redirect("admin/login");
		} else {
			$this->session->set_userdata('logged_in_status', TRUE);
			redirect("project");
		}

		$this->load->view("admin/footer");
	}

	public function home() {
		$this->validateUserSession();
		$this->load->view("admin/header");
		$this->load->view("admin/navigation");
		$this->load->view("admin/home");
		$this->load->view("admin/footer");
	}

	public function validateUserSession() {
		$logged_in_status = $this->session->userdata('logged_in_status');

		if (empty($logged_in_status)) {
			redirect("admin/login");
		}
	}

	public function logout() {
		$logged_in_status = $this->session->userdata('logged_in_status');
		$this->session->unset_userdata('logged_in_status');
		redirect("admin/login");
	}

	public function d($arr) {
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	public function test() {
		$this->load->view('test');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */