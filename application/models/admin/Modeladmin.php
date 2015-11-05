<?php

class ModelAdmin extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function validateUserCredentials($param) {
//        $query = $this->db->get_where('admin', array('UserName' => $param['username'], 'Password' => $param['password']));
//$this->load->database();
        $this->db->where(array('UserName' => $param['username'], 'Password' => $param['password']));
        $query = $this->db->get('admin'); 
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        return TRUE;
    }

}

?>