<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function recordExist() {
		$this->load->model('person');
		$this->load->model('offer');

		$data = $this->input->get();
		$p = $this->person->find($data['person']);
		$s = $data['school'];
		echo ( $this->offer->find($p, $s) ? 1 : 0 );
	}

	public function getSchoolList($type='all') {
		$this->load->model('school');

		$query = $this->input->get();
		
		if ($type == 'u') {

		} else if ($type == 'c') {

		} else {
			$list = $this->school->getNames();
			echo json_encode($list);
		}
	}
}