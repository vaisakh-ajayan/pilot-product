<?php

class UserController extends CI_Controller {

	public function loginAction()
	{
		$this->load->view('login');
	}
}