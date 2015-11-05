<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Example_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function add_ex($params) {
		$data = array(
			'name_project' => 'abc',
			"_id_category" => 1,
			'_id_county' => 1,
			'description' => $params);
		$query = $this->db->insert('project', $data);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
