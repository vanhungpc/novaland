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
			$this->session->set_flashdata('success_msg', 'Your project has been added successfully');
			redirect('county');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a project');
			redirect('county/addCounty');
		}
		/*  } else {
	$this->session->set_flashdata('error_msg', 'Please upload images in product');
	redirect('product/addProduct');
	}*/
	}

	public function editProduct($vehicleId) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($vehicleId)) {
			redirect('produce');
		}

		$data['product'] = $this->Productmodel->viewProduct($vehicleId);
		$data['id_make'] = $this->Productmodel->getMake();
		$data['id_style'] = $this->Productmodel->getStyle();
		$data['id_engine_size'] = $this->Productmodel->getEngine_size();
		$idverhicle = $data['product']['id'];

		$img = $this->Productmodel->getAllImageByIdProduct($idverhicle);
		$data['arrImages'] = $img;
		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/product_edit', $data);
		$this->load->view('admin/footer');
	}

	public function editProductFormSubmission($vehicleId) {

		$params['id_model'] = $this->input->post('modelDrp');
		$params['year'] = $this->input->post('yearDrp');
		$params['id_style'] = $this->input->post('id_style');
		$params['id_engine_size'] = $this->input->post('id_engine_size');
		$params['name'] = $this->input->post('name');
		$params['title'] = $this->input->post('title');
		$params['description'] = $this->input->post('description');
		$params['price'] = $this->input->post('price');
		$params['quantity_product'] = $this->input->post('quantity_product');
		// $dateTS = $this->input->post('create_date');
		//  $dateS = explode('/', $dateTS);
		// $params['create_date'] = date('Y-m-d');

		// $dateTE = $this->input->post('update_date');
		// $dateE = explode('/', $dateTE);
		$params['update_date'] = date('Y-M-d');

		$editVehicle = $this->Productmodel->editProduct($params, $vehicleId);
		// check success or not.
		if ($editVehicle) {
			$imageTemp = $this->Productmodel->getImageTemp($params);
			// check if user add more image, then add image from table tamp to table images.
			if ($imageTemp) {
				foreach ($imageTemp as $key => $value) {
					$paramsImg['id_product'] = $vehicleId;
					$paramsImg['url'] = $value->f_name;
					$paramsImg['name'] = $value->f_name;
					$paramsImg['create_date'] = date('Y-m-d');
					$paramsImg['update_date'] = date('Y-m-d');
					$addImages = $this->Productmodel->addImageProduct($paramsImg);
				}
				// when add all image to table image delete all image in table tamp
				$this->Productmodel->deleteTemp();
			} else {

			}

			$name_array = array();
			if (!empty($_FILES) && ($_FILES['file_upload']['size'] != 0)) {
				$count = sizeof($_FILES['file_upload']['tmp_name']);

				foreach ($_FILES as $key => $value) {
					for ($s = 0; $s <= $count - 1; $s++) {
						if ($_FILES['file_upload']['name'][$s] != null) {
							$imgage_name = $this->input->post('id_image');
							$id_image = $imgage_name[$s];

							$upload_dir = getcwd() . '' . '/uploads/product/';
							$tempFile = $_FILES['file_upload']['tmp_name'][$s];
							$targetPath = $upload_dir;
							// Adding timestamp with image's name so that files with same name can be uploaded easily.
							$fname = $targetPath . time() . '-' . $_FILES['file_upload']['name'][$s];
							$file_name = time() . '-' . $_FILES['file_upload']['name'][$s];

							$paramImg['url'] = $file_name;
							$addImages = $this->Productmodel->updateImage($paramImg, $id_image);
							move_uploaded_file($tempFile, $fname);
						}
					}
				}

			}

			$this->session->set_flashdata('success_msg', 'Your procut has been updated successfully');
			redirect('product');
		} else {
			$this->session->set_flashdata('error_msg', 'Please try again updating your vehicle');
			redirect('product/editProduct/' . $vehicleId);
		}
	}

	public function viewProduct($vehicleId) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($vehicleId)) {
			redirect('product');
		}

		$data['product'] = $this->Productmodel->viewProduct($vehicleId);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/product_view', $data);
		$this->load->view('admin/footer');
	}

	public function deleteProduct($vehicleId) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		$this->session->set_flashdata('success_msg', 'Your events is deleted successfully');
		$this->Productmodel->deleteProduct($vehicleId);
		redirect('product');
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