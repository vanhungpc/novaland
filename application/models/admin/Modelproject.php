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
	public function getAllProjectByIdCategory($_id_category) {
		$sql = "select * from project where _id_category = " . $_id_category;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	public function getAllProjectByName($name_project) {
		$sql = "select * from project where name_project like '%" . $name_project . "%'";
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

	public function getNewsById($_id_news) {
		$sql = "select * from news where _id_news = " . $_id_news;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return "";
		}
	}

	public function getCountyById($_id_county) {
		$sql = "select * from county where _id_county = " . $_id_county;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return "";
		}
	}

	public function getNameCategoryById($_id_category) {
		$sql = "select * from category where _id_category = " . $_id_category;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}
	public function getNameCountyById($_id_county) {
		$sql = "select * from county where _id_county = " . $_id_county;
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
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
		$sql = "select * from county order by name_county";
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
		$sql = "select * from news order by _id_news desc limit 6 ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	/*public function getAllNews_link() {
	$sql = "select * from news order by _id_news desc";
	$query = $this->db->query($sql);
	if ($query->num_rows() > 0) {
	return $query->result();
	} else {
	return "";
	}
	}*/

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
	}

	public function updateCounty($params, $_id_county) {
		$this->db->trans_start();
		$data = array(
			'name_county' => $params['name_county']);
		$this->db->where('_id_county', $_id_county);
		$query = $this->db->update('county', $data);
		$this->db->trans_complete();
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function deleteCounty($_id_county) {
		$sql = "DELETE FROM county
                WHERE _id_county = $_id_county";

		$query = $this->db->query($sql);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addNews($params) {
		$this->db->trans_start();
		$data = array(
			'title' => $params['title'],
			'content' => $params['content'],
			'date_create' => $params['date_create'],
			'img_news' => $params['img_news']);
		$query = $this->db->insert('news', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
//        if ($query) {
		//            return TRUE;
		//        } else {
		//            return FALSE;
		//        }
	}

	public function updateNews($params, $_id_news) {
		$this->db->trans_start();
		$data = array(
			'title' => $params['title'],
			'content' => $params['content'],
			'date_create' => $params['date_create'],
			'img_news' => $params['img_news']);
		$this->db->where('_id_news', $_id_news);
		$query = $this->db->update('news', $data);
		$this->db->trans_complete();
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function deleteNews($_id_news) {
		$sql = "DELETE FROM news
                WHERE _id_news = $_id_news";

		$query = $this->db->query($sql);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

?>