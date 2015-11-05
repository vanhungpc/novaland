<?php

class ModelHome extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function project() {
		$sql = "select * from project";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function addProject($params) {
		$this->db->trans_start();
		$data = array(
			'name_project' => $params['name_project'],
			'_id_category' => $params['category'],
			'_id_county' => $params['county'],
			'address' => $params['address'],
			'price' => $params['price'],
			'lat' => $params['lat'],
			'lng' => $params['lng'],
			'description' => $params['description'],
			'slider' => $params['slider']);
		$query = $this->db->insert('project', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
//        if ($query) {
		//            return TRUE;
		//        } else {
		//            return FALSE;
		//        }
	}

}

?>