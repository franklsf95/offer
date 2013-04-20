<?php

class School extends CI_Model {
	var $id = '';
	var $school = '';

	public function __construct() {
		parent::__construct();
	}

	public function getNames() {
		$this->db->select('id, name');
		$this->db->order_by('name');
		$q = $this->db->get('school');
		return $q->result_array();
	}
}