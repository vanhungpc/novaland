<?php
/**
 *
 */
class Job extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->model('job/Job_model', 'job');
		$this->load->model('job/Job_province_model', 'jobprovince');
		//$this->load->model('job/Search_model', 'search');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->library('pagination');

	}
	function index($value1, $value2, $value3 = "", $value4 = "") {
		$keyArr = array(array("p" => 0),
			array("s" => 0),
			array("x" => -1),
			array("l" => 0),
			array("t" => 0),
			array("c" => 0));
		log_message('error', 'value 4' . $value4);
		if (strlen($value4) > 0) {
			$keyRegex = array('p', 's', 'x', 'l', 't', 'c');
			$keyValue = $value4;
			$valueSearch = str_replace($keyRegex, "|", $value4);
			$valueSearchArray = explode("|", $valueSearch);
			$index = 1;
			$indexKey = 0;

			foreach ($keyRegex as $value) {
				if (strpos($keyValue, $value) !== false) {
					$keyArr[$indexKey][$value] = $valueSearchArray[$index];
					$index++;
				}
				$indexKey++;

			}
			//$jobSearch = $this->search->searchJob(urldecode($value1), $keyArr);
		} else {
			$valueSearch = null;
			//$keyArr = null;

		}

		if (isset($value1) && strlen($value1) >= 0) {
			$routeUrl = base_url('job') . '/' . $value1 . '/';
			switch ($value1) {
			case 'new-jobs':
				$province = $this->recruitment->getAllProvince();
				break;
			case 'jobs-at-japanese':
				$province = $this->recruitment->getAllProvinceByCountry(2);
				break;
			case 'jobs-at-south':
				$province = $this->recruitment->getAllProvinceByCountryRegion(1, 1);
				break;
			case 'jobs-at-north':
				$province = $this->recruitment->getAllProvinceByCountryRegion(3, 1);
				break;
			case 'jobs-at-middle':
				$province = $this->recruitment->getAllProvinceByCountryRegion(2, 1);
				break;
			default:
				redirect(base_url('search/all'));
				break;
			}
		} else {
			$routeUrl = base_url('search/');
		}
		//if (isset($value1) && strlen($value1) >= 0) {

		$arr_job_form = $this->recruitment->getAllJob_Form();
		$job_form_child = $this->recruitment->getAllJob_Form_Child();
		$job_level = $this->recruitment->getAllJob_Job_Level();
		$salary = $this->recruitment->getAllJob_Salary();
		$career = $this->recruitment->getAllJob_Career();
		//}
		//$keyArr = null;

		$jobSearch = $this->job->searchJobs(urldecode($value1), $value2, $keyArr);

		//$url = 'province/' . $provinceName . '-' . $id . '.html';
		$url = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($jobSearch);
		$config['per_page'] = "10";
		$config["uri_segment"] = 4;
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
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		// if ($page * $config["per_page"] >= count($jobSearch)) {
		// 	$page = 0;
		// }
		//call the model function to get the department data
		$jobSearchPagingnation = $this->job->searchJobs(urldecode($value1), $value2, $keyArr, $config["per_page"], $page);
		//log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;

		$head = $this->load->view('main/head', array('user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$searchJobs = $this->load->view('main/search-jobs', array(
			'province' => $province,
			'jobform' => $arr_job_form,
			'jobformchild' => $job_form_child,
			'salary' => $salary,
			'level' => $job_level,
			'career' => $career,
			'keyArr' => $keyArr,
			'keyWord' => $value2,
			'routeUrl' => $routeUrl), TRUE);

		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'user' => $user,
			'menu' => 'jobs',
		), TRUE);

		$content = $this->load->view('main/job/jobs', array('searchJobs' => $searchJobs, 'listJob' => $jobSearchPagingnation, 'numjob' => count($jobSearch), 'pagination' => $pagination,
			'value4' => $value4, 'keyArr' => $keyArr), TRUE);
		$scriptOption = array('assets/main/js/fix-content-list-job.js');
		$footer = $this->load->view('main/footer', array('scriptOption' => $scriptOption), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
}