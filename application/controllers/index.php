<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$get = $this->input->get();
		$this->view('index', $get, false, true, true);
	}

	public function auth() {
		$data = $this->input->post();
		if ($this->passKeyCheck($data['passkey'])) {
			$this->session->set_userdata('auth', 'approved');
			redirect('index/show');
		}
		else
			show_error('Authentication failed.');
	}

	public function show() {
		$isAuth = $this->loginCheck();
		$this->view('show', array('isAuth' => $isAuth), false, $isAuth, true); //do not load js if auth failed
	}

	public function changelog() {
		$this->view('changelog', null, false, false, false);
	}

	public function offer_csv() {
		if (!($this->loginCheck())) {
			show_error('Unauthorized access.');
		}
		$this->load->model('offer');
		$data = $this->offer->AllDetail();
		echo $this->array2csv($data);
	}

	public function offer_stat_csv() {
		$this->load->model('offer');
		$data = $this->offer->CountBySchool();
		echo $this->array2csv($data);
	}
}