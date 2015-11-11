<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->helper('url');
		$this->load->language('mci');
		$this->load->model('admin/Modelproject', 'project');
		$this->load->helper('language');
		$this->load->library('pagination');
	}
	public function index() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProject($config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();

		$data_pagination = $this->pagination->create_links();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));
	}

	function about() {
		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProject($config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/about', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
	function officetel() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByIdCategory(1, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}

	function apartment() {
		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByIdCategory(2, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}

	function house() {
		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByIdCategory(3, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
	function villas() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByIdCategory(4, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}

	function serviced_apartment() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByIdCategory(5, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
	function contact() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

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

		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProject($config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/contact', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));

	}
	public function seach_project() {

		//pagination settings
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->project->count_items();
		$config['per_page'] = "32";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data_page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$name_project = $this->input->post('name_project');
		$lang = $this->lang->mci_current();
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
		$data_project = $this->project->getAllProjectByName($name_project, $config["per_page"], $data_page);
		$data_slider = $this->project->getSliderProject();
		$data_video = $this->project->getAllVideo();
		$data_pagination = $this->pagination->create_links();
		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/home', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider, 'data_video' => $data_video, 'pagination' => $data_pagination, 'page' => $data_page), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'lang' => $lang,
			'content' => $content,
			'footer' => $footer));
	}

}