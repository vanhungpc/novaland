<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Video extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->model('admin/Modelproject', 'project');
		$this->load->language('mci');
		$this->load->helper('language');
	}

	public function index() {
		// checks whether the user is logged in or not
		$this->validateUserSession();
		$data['video'] = $this->project->getAllVideo($this->session->userdata('id'));

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/video', $data);
		$this->load->view('admin/footer');
	}

	public function addVideo() {

		// checks whether the user is logged in or not
		$this->validateUserSession();
		/*	$data['id_make'] = $this->Productmodel->getMake();
		$data['id_style'] = $this->Productmodel->getStyle();
		$data['id_engine_size'] = $this->Productmodel->getEngine_size();*/

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/video_add');
		$this->load->view('admin/footer');
	}

	public function deleteTeamById() {
		$upload_dir = getcwd() . '' . '/uploads/product/';
		$targetPath = $upload_dir;
		$name = $_GET['fid'];
		unlink($targetPath . $_GET['fid']);

		$addImages = $this->Productmodel->deleteTeamById($name);
	}

	public function addVideoFormSubmission() {
		$params['title_video'] = $this->input->post('title_video');
		$params['url_video'] = $this->input->post('url_video');
		$params['date_create'] = date('Y-m-d');

		$addvideo = $this->project->addVideo($params);
		if ($addvideo) {
			$this->session->set_flashdata('success_msg', 'Your video has been added successfully');
			redirect('video');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a video');
			redirect('video/addVideo');
		}
		/*  } else {
	$this->session->set_flashdata('error_msg', 'Please upload images in product');
	redirect('product/addProduct');
	}*/
	}

	public function editVideo($_id_video) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_video)) {
			redirect('video');
		}

		$data = $this->project->getVideoById($_id_video);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/video_edit', array('video' => $data));
		$this->load->view('admin/footer');
	}

	public function editVideoFormSubmission($_id_video) {

		$params['title_video'] = $this->input->post('title_video');
		$params['url_video'] = $this->input->post('url_video');
		$params['date_create'] = date('Y-m-d');

		$updatep = $this->project->updateVideo($params, $_id_video);
		if ($updatep) {
			$this->session->set_flashdata('success_msg', 'Your video has been added successfully');
			redirect('video');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a video');
			redirect('video/editNews');
		}
	}

	public function viewVideo($_id_video) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_video)) {
			redirect('video');
		}

		$data = $this->project->getVideoById($_id_video);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/video_view', array('video' => $data));
		$this->load->view('admin/footer');
	}

	public function deleteVideo($_id_video) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		$this->session->set_flashdata('success_msg', 'Your video is deleted successfully');
		$this->project->deleteVideo($_id_video);
		redirect('video');
	}

	public function validateUserSession() {
		$logged_in_status = $this->session->userdata('logged_in_status');

		if (empty($logged_in_status)) {
			redirect("admin/login");
		}
	}

	public function all_video() {
		$lang = $this->lang->mci_current();
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '95px',
			'logoHeight' => '95px',
		), TRUE);
		$data = $this->project->getAllCounty($lang);
		$data_news = $this->project->getAllNews();
		// $data_project = $this->project->getAllProject();
		$data_slider = $this->project->getSliderProject();
		$data_video_all = $this->project->getAllVideo_All();
		$data_video = $this->project->getAllVideo();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/all_video', array('county' => $data, 'arr_news' => $data_news, 'data_slider' => $data_slider, 'data_video' => $data_video, 'data_video_all' => $data_video_all), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
}

/* End of file events.php */
/* Location: ./application/controllers/events.php */