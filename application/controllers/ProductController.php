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
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->helper('url');
		// $this->load->view('welcome_message');

		$this->load->model('ProductModel');

		// $config['base_url'] = 'http://localhost/product_list/products/';
		// $config['per_page'] = 5;
		// $config['total_rows']=$this->ProductModel->totalRows();
		// $config['num_links'] = 2;
		// $config['uri_segment'] = 2;
		// $config['full_tag_open']='<ul class="pagination justify-content-center">';
		// $config['full_tag_close']='</ul>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item pg-f">';
		// $config['first_tag_close'] = '</li>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item pg-l">';
		// $config['last_tag_close'] = '</li>';
		// $config['next_link'] = '&gt;';
		// $config['next_tag_open'] = '<li class="page-item pg-n">';
		// $config['next_tag_close'] = '</li>';
		// $config['prev_link'] = '&lt;';
		// $config['prev_tag_open'] = '<li class="page-item pg-p">';
		// $config['prev_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="page-item active pg-c"><a href="#" class="page-link">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['attributes'] = array('class' => 'page-link');
		// $this->pagination->initialize($config);
		// // $this->load->library('uri');
		// $page = $this->uri->segment(2, 0);
		// $limits=$config['per_page'];
		// $offset = ($page);

		// $ctv['pageLinks']= $this->pagination->create_links();

		
		// $ctv['allProducts']=$this->ProductModel->selectPaginatedProducts($limits,$offset);
		
		
		$ctv['categoryValues']=$this->ProductModel->getCategory();
		
		$this->load->view('main-page',$ctv);
	}

	public function loads(){
		// echo 'jncnksd';die;
		if ($this->input->method(FALSE)=='get' && $this->input->is_ajax_request()) {
			$this->load->model('ProductModel');

			$config['base_url'] = 'http://localhost/product_list/products/';
			$config['per_page'] = 30;
			$config['total_rows']=$this->ProductModel->totalRows();
			$config['num_links'] = 2;
			$config['uri_segment'] = 2;
			$config['full_tag_open']='<ul class="pagination justify-content-center">';
			$config['full_tag_close']='</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li class="page-item pg-f">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="page-item pg-l">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li class="page-item pg-n">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li class="page-item pg-p">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active pg-c"><a href="#" class="page-link">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			// $this->load->library('uri');
			$page = $this->uri->segment(2, 0);
			$limits=$config['per_page'];
			$offset = ($page);

			$data['pageLinks']=$this->pagination->create_links();
			$data['productValues']=$this->ProductModel->selectPaginatedProducts($limits,$offset);
			// $data['categoryValues']=$this->ProductModel->getCategory();
			// $data['result']='success';
			// $data['message']="ajax call";
			echo json_encode($data);

		}
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
			$this->form_validation->set_rules('productName','Product name','required|trim');
			$this->form_validation->set_rules('productDesc','Product description','required|trim');
			$this->form_validation->set_rules('status','Status','required|trim');
			$this->form_validation->set_rules('prodCategory','Product category','required|trim');

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
				$productName=$this->input->post('productName');
				$productDescription=$this->input->post('productDesc');
				$status=(int)$this->input->post('status');
				$dateAdded=mdate($format);
				$productCategory=(int)$this->input->post('prodCategory');
				
				$credentials=array(
					'product_name'=>$productName,
					'product_description'=>$productDescription,
					'product_status'=>$status,
					'date_added'=>$dateAdded,
					'category_id'=>$productCategory
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
			$productId=(int)$this->input->post('id');
			$credentials=array(
				'product_id'=>$productId
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
			$productId=(int)$this->input->get('id');
			$credentials=array(
				'product_id'=>$productId
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
			$this->form_validation->set_rules('productName','product name','required|trim');
			$this->form_validation->set_rules('productDesc','product description','required|trim');
			$this->form_validation->set_rules('status','status','required|trim');
			$this->form_validation->set_rules('prodCategory','product category','required|trim');

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
				$productName=$this->input->post('productName');
				$productDescription=$this->input->post('productDesc');
				$status=(int)$this->input->post('status');
				$productCategory=(int)$this->input->post('prodCategory');

				$credentials=array(
					'id'=>$id,
					'product_name'=>$productName,
					'product_description'=>$productDescription,
					'product_status'=>$status,
					'category_id'=>$productCategory
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
			$productId=$this->input->post('productId');
			$productStatus=0;

			$credentials=array(
				'product_id'=>$productId,
				'product_status'=>$productStatus
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
			$productId=$this->input->post('productId');
			$productStatus=1;

			$credentials=array(
				'product_id'=>$productId,
				'product_status'=>$productStatus
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
			$productId=$this->input->post('productId');
			$credentials=array(
				'product_id'=>$productId
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

	//search
	public function search(){
		if ($this->input->post() && $this->input->is_ajax_request()) {
			$value=$this->input->post('value');
			$option=$this->input->post('option');

			$data['result']="success";
			$data['productValues']=$this->ProductModel->searchProduct($value,$option);
			echo json_encode($data);
		}
	}
}
