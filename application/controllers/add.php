<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends MY_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('offer');
	}

	public function index()
	{
		$this->view('add', null, true, true);
	}

	public function submit()
	{
		$data = $this->input->post();
		$ip = $this->input->ip_address();
		$person = $this->getPersonId($data['person']);
		$cnt = 0;

		if ($this->isValidToken($data['token'])) {
			if (is_array($data['school']))
				foreach ($data['school'] as $s)
				{
					if ( $this->offer->insert($person, $s, $data['token'], $ip) > 0 )
						$cnt++;
					else
						show_error("Duplicate record. $cnt records successfully inserted.");
				}
		}
		redirect("/index?added=$cnt");
	}

	public function get(){
		$data = $this->input->get();
		echo $this->getPersonId($data['name']);
	}

	/*
	  Get an existing person's ID; otherwise create a new record
	 */
	private function getPersonId($s)
	{
		$this->load->model('person');
		$id = $this->person->find($s);
		if ($id == -1) {
			$id = $this->person->insert($s);
		}
		return $id;
	}

	private function isValidToken($t)
	{
		return $t != null;
	}
}