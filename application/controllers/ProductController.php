<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ProductModel');
		$this->load->helper('url');
		$this->load->library('pagination');
		if (!$this->session->userdata('email')) {
			redirect('signup');
		}
	}

	public function index()
	{
		$this->load->helper('url');
		// $this->load->view('welcome_message');

		$this->load->model('ProductModel');

		// $config['per_page'] = 5;
		// $config['total_rows']=

		if (!$this->ProductModel->selectAllProducts()) {
			$ctv['isProducts']="false";
		}
		else{
			$ctv['allProducts']=$this->ProductModel->selectAllProducts();
		}
		if (!$this->ProductModel->getCategory()) {
			
		}
		else{
			$ctv['categoryValues']=$this->ProductModel->getCategory();
		}
		$this->load->view('main-page',$ctv);
	}

	public function addCategory(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('categoryName','categoryName','required|trim');
			if ($this->form_validation->run()==FALSE) {
	        	$data['result']="failed";
	        	$data['catValError']="Category name is required";
	        	echo json_encode($data);
	        }
			
			else{
				$categoryName=$this->input->post('categoryName');

				$credentials=array(
				'category'=>$categoryName
				);
				$this->load->model('ProductModel');
				if ($this->ProductModel->categoryCheck($credentials)) {
					$data['result']="failed";
					$data['catValError']="This category already exists";
					echo json_encode($data);
				}
				else{
					if (!$this->ProductModel->registerCategory($credentials)) {
						$data['result']="success";
						$data['error'] = "true";
						$data['message']="Some thing went wrong!";
						echo json_encode($data);
					}
					else{
						$data['categoryValues']=$this->ProductModel->getLastCategory();
						$data['result']="success";
						$data['error'] = "false";
						$data['message'] = "Category succesfully added";
						echo json_encode($data);
					}
				}
			}

		}
	}

	//add products from form
	public function addProduct(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('productName','productName','required|trim');
			$this->form_validation->set_rules('productDesc','productDesc','required|trim');
			$this->form_validation->set_rules('status','status','required|trim');
			$this->form_validation->set_rules('prodCategory','prodCategory','required|trim');

			if ($this->form_validation->run()==FALSE) {
				$data['result']="failed";
				$data['valErrors']=array(
					"nameError"=>form_error('productName'),
					"descError"=>form_error('productDesc'),
					"statusError"=>form_error('status'),
					"categoryError"=>form_error('prodCategory')
				);
				echo json_encode($data);
			}

			else{
				$this->load->helper('date');
				$format = "%Y-%m-%d";
				$product_name=$this->input->post('productName');
				$product_description=$this->input->post('productDesc');
				$product_status=(int)$this->input->post('status');
				$date_added=mdate($format);
				$category_id=(int)$this->input->post('prodCategory');
				
				$credentials=array(
					'product_name'=>$product_name,
					'product_description'=>$product_description,
					'product_status'=>$product_status,
					'date_added'=>$date_added,
					'category_id'=>$category_id
				);

				//upload file
				$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'jpg|png|jpeg';
		        $this->load->library('upload', $config);

		        $this->load->model('ProductModel');
				//check whether the product already exists
				if ($this->ProductModel->productCheck($credentials)) {
					$data['result']="failed";
					$data['prodExists']="This product already exists";
					echo json_encode($data);
				}
				else{
					if (!$this->ProductModel->registerProduct($credentials)) {
						$data['result']="failed";
						$data['internalErr']="true";
						$data['message']="Some thing went wrong!";
						echo json_encode($data);
					}
					else{
						$data['productValues']=$this->ProductModel->getLastProduct();
						$data['result']="success";
						$data['message'] = "Product succesfully added";
						echo json_encode($data);
					}
				}
				
				// if (!$this->upload->do_upload('userfile')) {
				// 	$data['error']="true";
				// 	$data['result']="failed";
				// 	$data['imageError']="image upload failed! try again";
				// 	echo json_encode($data);
				// }
				// else{
				// 	$data['result']="success";
				// 	echo json_encode($data);
				// }
				
			}
		}
	}

	//product details
	public function productDetails(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$product_id=(int)$this->input->post('id');
			$credentials=array(
				'product_id'=>$product_id
			);

			$this->load->model('ProductModel');
			if (!$this->ProductModel->getSingleProduct($credentials)) {
				$data['result']="failed";
				$data['message']="Request for product details failed! try again";
				echo json_encode($data);
			}
			else{
				$data['result']="success";
				$data['proDetails']=$this->ProductModel->getSingleProduct($credentials);
				echo json_encode($data);
			}
		}
	}

	public function editProduct(){
		if ($this->input->get() && $this->input->is_ajax_request()) {
			$product_id=(int)$this->input->get('id');
			$credentials=array(
				'product_id'=>$product_id
			);

			$this->load->model('ProductModel');
			if (!$this->ProductModel->getSingleProduct($credentials)) {
				$data['result']="failed";
				$data['message']="Request for edit products failed! try again";
				echo json_encode($data);
			}
			else{
				$data['result']="success";
				$data['proDetails']=$this->ProductModel->getSingleProduct($credentials);
				echo json_encode($data);
			}
		}
		else if ($this->input->post() && $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('productName','productName','required|trim');
			$this->form_validation->set_rules('productDesc','productDesc','required|trim');
			$this->form_validation->set_rules('status','status','required|trim');
			$this->form_validation->set_rules('prodCategory','prodCategory','required|trim');

			if ($this->form_validation->run()==FALSE) {
				$data['result']="failed";
				$data['valErrors']=array(
					"nameError"=>form_error('productName'),
					"descError"=>form_error('productDesc'),
					"statusError"=>form_error('status'),
					"categoryError"=>form_error('prodCategory')
				);
				echo json_encode($data);
			}
			else{
				$id=$this->input->post('productId');
				$product_name=$this->input->post('productName');
				$product_description=$this->input->post('productDesc');
				$product_status=(int)$this->input->post('status');
				$category_id=(int)$this->input->post('prodCategory');

				$credentials=array(
					'id'=>$id,
					'product_name'=>$product_name,
					'product_description'=>$product_description,
					'product_status'=>$product_status,
					'category_id'=>$category_id
				);

				$single=array(
					'product_id'=>$id
				);

				if (!$this->ProductModel->updateProduct($credentials)) {
					$data['result']="failed";
					$data['internalErr']="true";
					$data['message']="Some thing went wrong!";
					echo json_encode($data);
				}
				else{
					$data['productDetails']=$this->ProductModel->getSingleProduct($single);
					$data['result']="success";
					$data['message'] = "Product succesfully updated";
					echo json_encode($data);
				}
			}
		}
	}

	//disable product
	public function disableProduct(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$product_id=$this->input->post('productId');
			$product_status=0;

			$credentials=array(
				'product_id'=>$product_id,
				'product_status'=>$product_status
			);

			$this->load->model('ProductModel');
			if (!$this->ProductModel->disable($credentials)) {
				$data['result']="failed";
				$data['message']="Some thing went wrong!";
				echo json_encode($data);
			}
			else{
				$data['result']="success";
				echo json_encode($data);
			}
		}
	}

	//enable product
	public function enableProduct(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$product_id=$this->input->post('productId');
			$product_status=1;

			$credentials=array(
				'product_id'=>$product_id,
				'product_status'=>$product_status
			);

			$this->load->model('ProductModel');
			if (!$this->ProductModel->enable($credentials)) {
				$data['result']="failed";
				$data['message']="Some thing went wrong!";
				echo json_encode($data);
			}
			else{
				$data['result']="success";
				echo json_encode($data);
			}
		}
	}


	//delete product
	public function deleteProduct(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$product_id=$this->input->post('productId');
			$credentials=array(
				'product_id'=>$product_id
			);
		}

		$this->load->model('ProductModel');
		if (!$this->ProductModel->deleteOne($credentials)) {
			$data['result']="failed";
			$data['message']="Some thing went wrong!";
			echo json_encode($data);
		}
		else{
			$data['result']="success";
			echo json_encode($data);
		}
	}
}
