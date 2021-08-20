<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if (!$this->session->userdata('email')) {
			redirect('signup');
		}
	}

	public function index()
	{
		$this->load->helper('url');
		// $this->load->view('welcome_message');
		$this->load->view('main-page');
	}
}
