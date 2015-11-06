<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->helper('url');
		$this->load->model('admin/Modelproject', 'project');
	}
	public function index() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'home',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProject();
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));
	}

	function about() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'about',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProject();
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/about', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}
	function officetel() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'officetel',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProjectByIdCategory(1);
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}

	function apartment() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'apartment',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProjectByIdCategory(2);
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}

	function house() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'house',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProjectByIdCategory(3);
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}
	function villas() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'villas',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProjectByIdCategory(4);
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}

	function serviced_apartment() {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'serviced_apartment',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProjectByIdCategory(5);
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}
	function contact() {
		if (isset($_POST['submit'])) {
			$your_name = $this->input->post("name");
			$phone = $this->input->post("phone");
			$email = $this->input->post("email");
			$subject = $this->input->post("subject");
			$content = $this->input->post("content");
			// send mail
			$headers = "From: phancuong0209@gmail.com"; //. "\r\n" .
			// "CC: somebodyelse@example.com";
			mail($email, $subject, $content, $headers);
			$this->session->set_flashdata('success_msg', 'Your product has been added successfully!');

		}
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',
			'menu' => 'contact',
		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProject();
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/contact', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));

	}

}