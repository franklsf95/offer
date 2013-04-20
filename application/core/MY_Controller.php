<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected function loginCheck()
	{
		return ($this->session->userdata('auth') == 'approved');
	}

	protected function passKeyCheck($passkey)
	{
		return (sha1($passkey) == 'a6538a75623adcfce0979e24d0d7d769d47b0668');
	}

	protected function array2csv($a) {
		$s = '';
		$s .= join(',', array_keys($a[0]));
		$s .= "\n";
		foreach ($a as $row) {
			$s .= '"';
			$s .= join('","', $row);
			$s .= '"';
			$s .= "\n";
		}
		return $s;
	}

	protected function view($s='index', $data, $morecss = false, $morejs = false, $recline = false, $cache_time = 1440)
	{
		if (ENVIRONMENT == 'production')
			$this->output->cache($cache_time);

		$this->load->view('header');
		if ($recline)
			$this->load->view("recline.php");
		if ($morecss)
			$this->load->view("$s.css.php");
		$this->load->view('header_end');

		$this->load->view('nav', array('page' => $s) );

		$this->load->view($s, $data);
		$this->load->view('footer');
		if ($morejs)
			$this->load->view("$s.js.php");
		$this->load->view('footer_end');
	}
}