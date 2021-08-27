<?php

class UserController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('email');
		$this->load->model('UserModel');
	}

	public function signupMethod(){
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email','required|trim|valid_email');
        	$this->form_validation->set_rules('password', 'Password','required|trim|min_length[4]');
        	$this->form_validation->set_rules('re_password', 'Password retype','required|trim|min_length[4]');

        	if ($this->form_validation->run()==FALSE) {
	        	$this->load->view('signup');
	        }
	        else{
	        	$email = $this->input->post('email');
		    	$password = $this->input->post('password');
		    	$repassword = $this->input->post('re_password');

		    	$credentials=array(
		    		'email'=>$email,
		    		'password'=>$password
		    	);

		    	$this->load->model('UserModel');

		    	if ($this->UserModel->emailCheck($credentials)) {
		    		$data['mulEmail']="This email already exists";
		    	}
		    	if ($password != $repassword) {
		    		$data['passMismatch']="Enter same password in both password fields";
		    	}
		    	if (!empty($data)) {
		    		$this->load->view('signup',$data);
		    	}
		    	else{
		    		if (!$this->UserModel->registerUser($credentials)) {
			    		$data['error'] = "Sorry, something went wrong!";
			    		$this->load->view('signup', $data);
			    	}
			    	else{
			    		$data['message'] = "Thank you for signing up.";
			    		redirect(base_url('login'));
			    	}
		    	}

	        }
		}
		else{
			$this->load->view('signup');
		}

	}

	//login
	public function loginMethod(){
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email','required|trim|valid_email');
        	$this->form_validation->set_rules('password', 'Password','required|trim|min_length[4]');
			if ($this->form_validation->run()==FALSE) {
	        	$this->load->view('login');
	        }
	        else{
	        	$email = $this->input->post('email');
		    	$password = $this->input->post('password');

		    	$credentials=array(
		    		'email'=>$email,
		    		'password'=>$password
		    	);

		    	$this->load->model('UserModel');
		    	if (!$this->UserModel->loginUser($credentials)) {
		    		$this->session->set_flashdata('error','Invalid email or password');
		    		redirect(base_url('login'));
		    	}
		    	else{
		    		$userdata=array('email'=>$email);
		    		$this->session->set_userdata($userdata);
		    		redirect(base_url(''));
		    	}
	        }
		}
		else{
			$this->load->view('login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		redirect(base_url('login'));
	}
}