<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class News extends CI_Controller {

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
		$data['news'] = $this->project->getAllNews($this->session->userdata('id'));

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news', $data);
		$this->load->view('admin/footer');
	}

	public function addNews() {

		// checks whether the user is logged in or not
		$this->validateUserSession();
		/*	$data['id_make'] = $this->Productmodel->getMake();
		$data['id_style'] = $this->Productmodel->getStyle();
		$data['id_engine_size'] = $this->Productmodel->getEngine_size();*/

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news_add');
		$this->load->view('admin/footer');
	}

	public function deleteTeamById() {
		$upload_dir = getcwd() . '' . '/uploads/product/';
		$targetPath = $upload_dir;
		$name = $_GET['fid'];
		unlink($targetPath . $_GET['fid']);

		$addImages = $this->Productmodel->deleteTeamById($name);
	}

	public function addNewsFormSubmission() {
		$params['title'] = $this->input->post('title');
		$params['content'] = $this->input->post('txt_content');
		$params['date_create'] = date('Y-m-d');

		$params['img_news'] = "";
		$targetFolder = '/uploads/img_news';

		if (!empty($_FILES)) {
			$picId = rand(10000, 500000);
			$tempFile = $_FILES['file_upload']['tmp_name'];
			$targetPath = getcwd() . '' . $targetFolder;
			$image_name = $picId . "_" . str_replace(' ', '', $_FILES['file_upload']['name']);

			$targetFile = rtrim($targetPath, '/') . '/' . $image_name;
			// Validate the file type
			$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
			$fileParts = pathinfo($image_name);
//echo $tempFile.''.$targetFile;exit();
			if (in_array($fileParts['extension'], $fileTypes)) {
				move_uploaded_file($tempFile, $targetFile);
				$_FILES['Filedata']['name'] = $image_name;
				$params['img_news'] = 'img_news/' . $image_name;

			} else {
				echo 'Invalid file type.';
			}
		}

		$addprojecr = $this->project->addNews($params);
		if ($addprojecr) {
			$this->session->set_flashdata('success_msg', 'Your news has been added successfully');
			redirect('news');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a news');
			redirect('news/addNews');
		}
		/*  } else {
	$this->session->set_flashdata('error_msg', 'Please upload images in product');
	redirect('product/addProduct');
	}*/
	}

	public function editNews($_id_news) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_news)) {
			redirect('news');
		}

		$data = $this->project->getNewsById($_id_news);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news_edit', array('news' => $data));
		$this->load->view('admin/footer');
	}

	public function editNewsFormSubmission($_id_news) {

		$params['title'] = $this->input->post('title');
		$params['content'] = $this->input->post('txt_content');
		$params['date_create'] = date('Y-m-d');

		$params['img_news'] = "";
		$targetFolder = '/uploads/img_news';

		if (!empty($_FILES) && ($_FILES['file_upload']['size'] != 0)) {
			$picId = rand(10000, 500000);
			$tempFile = $_FILES['file_upload']['tmp_name'];
			$targetPath = getcwd() . '' . $targetFolder;
			$image_name = $picId . "_" . str_replace(' ', '', $_FILES['file_upload']['name']);

			$targetFile = rtrim($targetPath, '/') . '/' . $image_name;
			// Validate the file type
			$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
			$fileParts = pathinfo($image_name);

			if (in_array($fileParts['extension'], $fileTypes)) {
				move_uploaded_file($tempFile, $targetFile);
				$_FILES['Filedata']['name'] = $image_name;
				$params['img_news'] = 'img_news/' . $image_name;

			} else {
//                echo 'Invalid file type.';
				$this->session->set_flashdata('error_msg', 'Please try again, Invalid file type');
				redirect('news/editNews/' . $_id_news);
			}
		} else {
			$params['img_news'] = $this->input->post('image_name');

		}

		$updatep = $this->project->updateNews($params, $_id_news);
		if ($updatep) {
			$this->session->set_flashdata('success_msg', 'Your news has been added successfully');
			redirect('news');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a news');
			redirect('news/editNews');
		}
	}

	public function viewNews($_id_news) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_news)) {
			redirect('news');
		}

		$data = $this->project->getNewsById($_id_news);

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news_view', array('news' => $data));
		$this->load->view('admin/footer');
	}

	public function deleteNews($_id_news) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		$this->session->set_flashdata('success_msg', 'Your news is deleted successfully');
		$this->project->deleteNews($_id_news);
		redirect('news');
	}

	public function validateUserSession() {
		$logged_in_status = $this->session->userdata('logged_in_status');

		if (empty($logged_in_status)) {
			redirect("admin/login");
		}
	}
	public function detail_news($_id_news) {
		$lang = $this->lang->mci_current();
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',

		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_news_id = $this->project->getNewsById($_id_news);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/news_detail', array('county' => $data, 'arr_news' => $data_news, 'data_news_id' => $data_news_id, 'data_slider' => $data_slider, 'data_video' => $data_video), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));
	}

	public function all_news() {
		$lang = $this->lang->mci_current();
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_all_news = $this->project->getAllNews_link();
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/all_news', array('county' => $data, 'arr_news' => $data_news, 'data_all_news' => $data_all_news, 'data_slider' => $data_slider, 'data_video' => $data_video), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
}

/* End of file events.php */
/* Location: ./application/controllers/events.php */