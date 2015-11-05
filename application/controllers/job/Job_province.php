<?php
/**
 *
 */
class Job_province extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->model('job/Job_model', 'job');
		$this->load->model('job/Job_province_model', 'jobprovince');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->library('pagination');

	}

	function index($provinceName, $id) {
		$province = $this->jobprovince->getProvince($id);
		$listRecruitmentProvince = $this->jobprovince->getListRecruitmentProvince($id);
		$url = 'province/' . $provinceName . '-' . $id . '.html';
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($listRecruitmentProvince);
		$config['per_page'] = "10";
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
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($page * $config["per_page"] >= count($listRecruitmentProvince)) {
			$page = 0;
		}
		//call the model function to get the department data
		$listRecruitmentProvincePage = $this->jobprovince->getListRecruitmentProvince($id, $config["per_page"], $page);
		log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;

		$head = $this->load->view('main/head', array('user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$searchHorizontal = $this->load->view('main/search-horizontal', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'user' => $user,
			'menu' => '',
		), TRUE);

		$content = $this->load->view('main/job/job-province', array('searchHorizontal' => $searchHorizontal, 'province' => $province, 'listJob' => $listRecruitmentProvincePage, 'page' => $page, 'pagination' => $pagination, 'numjob' => count($listRecruitmentProvince)), TRUE);

		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
}