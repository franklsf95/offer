<?php

class Person extends CI_Model {
	var $name = '';

	public function __construct() {
		parent::__construct();
	}

	public function find($s) {
		$this->db->where('name', $s);
		$this->db->select('id');
		$arr = $this->db->get('person')->result_array();
		if (isset($arr[0]))
			return $arr[0]['id'];
		else
			return -1;
	}

	public function insert($s) {
		$this->name = $s;
		$this->db->insert('person', $this);

		return $this->db->insert_id();
	}
}