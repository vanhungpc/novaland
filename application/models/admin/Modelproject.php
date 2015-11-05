<?php

class ModelProject extends CI_Model {

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
	public function getAllProject() {
		$sql = "select * from project";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}
	public function getProjectById($_id_project) {
		$sql = "select * from project where _id_project = " . $_id_project;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return "";
		}
	}

	public function getAllCategory() {
		$sql = "select * from category";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	public function getAllCountyAdmin() {
		$sql = "select * from county";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	public function getSliderProject() {
		$sql = "select * from project where slider = 2";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}
	public function getAllCounty() {
		$sql = "select * from county";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if ($this->checProjectByCounty($row->_id_county) == 1) {
					$data['name_county'] = $row->name_county;
					$data['arr_project'] = $this->getProjectByCounty($row->_id_county);
					$dataex[] = $data;
				}

			}

			return $dataex;
		} else {
			return "";
		}
	}
	public function checProjectByCounty($id_county) {
		$sql = "select * from project where _id_county = " . $id_county;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	public function getProjectByCounty($id_county) {
		$sql = "select * from project where _id_county = " . $id_county;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if ($this->checProjectByCounty($row->_id_county) == 1) {
					$data['name_project'] = $row->name_project;
					$data['_id_project'] = $row->_id_project;
					$dataex[] = $data;
				}

			}
			return $dataex;
		} else {
			return "";
		}
	}

	public function getAllNews() {
		$sql = "select * from news";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
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
			'slider' => $params['slider'],
			'desc_slider' => $params['desc_slider'],
			'img_slider' => $params['img_slider']);
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
	public function updateProject($params, $_id_project) {
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
			'slider' => $params['slider'],
			'desc_slider' => $params['desc_slider'],
			'img_slider' => $params['img_slider']);
		$this->db->where('_id_project', $_id_project);
		$query = $this->db->update('project', $data);
		$this->db->trans_complete();
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deleteProject($_id_project) {
		$sql = "DELETE FROM project
                WHERE _id_project = $_id_project";

		$query = $this->db->query($sql);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addCounty($name_county) {
		$data = array(
			'name_county' => $name_county);
		$this->db->trans_start();
		$query = $this->db->insert('county', $data);
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