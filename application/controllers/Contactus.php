<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Contactus extends CI_Controller {

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

		$data = $this->project->getContactUs();

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/contactus_edit', array('contactus' => $data));
		$this->load->view('admin/footer');

	}

	public function editContactUsFormSubmission($_id_contactus) {

		$params['content_contactus'] = $this->input->post('txt_content');

		$updatep = $this->project->updateContactUs($params, $_id_contactus);
		if ($updatep) {
			$this->session->set_flashdata('success_msg', 'Your contact us has been update successfully');
			redirect('contactus');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a news');
			redirect('contactus');
		}
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
			'logoWidth' => '95px',
			'logoHeight' => '95px',

		), TRUE);
		$data = $this->project->getAllCounty($lang);
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
			'logoWidth' => '95px',
			'logoHeight' => '95px',
		), TRUE);
		$data = $this->project->getAllCounty($lang);
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