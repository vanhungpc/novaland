<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class County extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->model('admin/Modelproject', 'project');
	}

	public function index() {
		// checks whether the user is logged in or not
		$this->validateUserSession();
		$data['county'] = $this->project->getAllCountyAdmin($this->session->userdata('id'));

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/county', $data);
		$this->load->view('admin/footer');
	}

	public function addCounty() {

		// checks whether the user is logged in or not
		$this->validateUserSession();
		/*	$data['id_make'] = $this->Productmodel->getMake();
		$data['id_style'] = $this->Productmodel->getStyle();
		$data['id_engine_size'] = $this->Productmodel->getEngine_size();*/

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/county_add');
		$this->load->view('admin/footer');
	}

	public function deleteTeamById() {
		$upload_dir = getcwd() . '' . '/uploads/product/';
		$targetPath = $upload_dir;
		$name = $_GET['fid'];
		unlink($targetPath . $_GET['fid']);

		$addImages = $this->Productmodel->deleteTeamById($name);
	}

	public function addCountyFormSubmission() {
		$name_county = $this->input->post('name_county');

		$addcounty = $this->project->addCounty($name_county);
		if ($addcounty) {
			$this->session->set_flashdata('success_msg', 'Your county has been added successfully');
			redirect('county');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a county');
			redirect('county/addCounty');
		}
		/*  } else {
	$this->session->set_flashdata('error_msg', 'Please upload images in product');
	redirect('product/addProduct');
	}*/
	}

	public function editCounty($_id_county) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_county)) {
			redirect('county');
		}

		$data['county'] = $this->project->getCountyById($_id_county);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/county_edit', $data);
		$this->load->view('admin/footer');
	}

	public function editCountyFormSubmission($_id_county) {

		$params['name_county'] = $this->input->post('name_county');

		$editcounty = $this->project->updateCounty($params, $_id_county);
		if ($editcounty) {
			$this->session->set_flashdata('success_msg', 'Your county has been added successfully');
			redirect('county');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a county');
			redirect('county/editCounty');
		}
	}

	public function viewCounty($_id_county) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_county)) {
			redirect('county');
		}

		$data['county'] = $this->project->getCountyById($_id_county);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/county_view', $data);
		$this->load->view('admin/footer');
	}

	public function deleteCounty($_id_county) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		$this->session->set_flashdata('success_msg', 'Your county is deleted successfully');
		$this->project->deleteCounty($_id_county);
		redirect('county');
	}

	public function validateUserSession() {
		$logged_in_status = $this->session->userdata('logged_in_status');

		if (empty($logged_in_status)) {
			redirect("admin/login");
		}
	}

}

/* End of file events.php */
/* Location: ./application/controllers/events.php */