<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$get = $this->input->get();
		$this->view('school', $get, false, true, true);
	}
}