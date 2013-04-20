<?php

class Offer extends CI_Model {
	var $person = 0;
	var $school = 0;

	public function __construct() {
		parent::__construct();
	}

	public function insert($p, $s, $t, $ip='')
	{
		if ($this->find($p, $s))
			return -1;

		$this->person = $p;
		$this->school = $s;
		$this->token  = $t;
		$this->ip     = $ip;

		$this->db->insert('offer', $this);

		return $this->db->insert_id();
	}

	public function find($p, $s)
	{
		$this->db->from('offer');
		$this->db->where('person', $p);
		$this->db->where('school', $s);
		return ($this->db->count_all_results() > 0);
	}

	public function CountBySchool() {
		$this->db->select('s.ranking, s.name as school, count(o.person) as count, s.city, s.state, s.lat, s.lon');
		$this->db->from('offer as o');
		$this->db->join('school as s', 's.id = o.school');
		$this->db->group_by('school');
		$this->db->order_by('s.ranking');

		$q = $this->db->get();
		return $q->result_array();
	}

	public function AllDetail() {
		$this->db->select('s.ranking, s.name as school, p.name, s.city, s.state, s.lat, s.lon');
		$this->db->from('offer as o');
		$this->db->join('school as s', 's.id = o.school');
		$this->db->join('person as p', 'p.id = o.person');
		$this->db->order_by('school');

		$q = $this->db->get();
		return $q->result_array();
	}
}