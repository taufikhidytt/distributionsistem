<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['judul'] = 'Dashboard';
		$this->template->load('template','index', $data);
	}
}
