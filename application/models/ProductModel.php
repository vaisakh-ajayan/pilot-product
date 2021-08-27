<?php


class ProductModel extends CI_Model{
	public function categoryCheck($credentials){
		$this->db->where('category',$credentials['category']);
		$query=$this->db->get('category_table');
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	//add category
	public function registerCategory($credentials){
		if ($this->db->insert('category_table',$credentials)) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//get category
	public function getCategory(){
		$query = $this->db->get('category_table');

		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//get last item of category
	public function getLastCategory(){
		$this->db->select("*");
		$this->db->from("category_table");
		$this->db->limit(1);
		$this->db->order_by('id',"DESC");
		$query = $this->db->get();
		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//check if product name exists
	public function productCheck($credentials){
		$this->db->where('product_name',$credentials['product_name']);
		$query=$this->db->get('products');
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//insert product
	public function registerProduct($credentials){
		// $data=array(
		// 	'product_name'=>$credentials['product_name'],
		// 	'product_description'=>$credentials['product_description'],
		// 	'product_status'=>$credentials['product_status'],
		// 	'date_added'=>$credentials['date_added'],
		// 	'product_image'=>$credentials['$image'],
		// 	'category_id'=>$credentials['category_id']
		// );
		if ($this->db->insert('products',$credentials)) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//get last product
	public function getLastProduct(){
		$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
		$this->db->from("products");
		
		$this->db->limit(1);
		$this->db->order_by('products.id',"DESC");
		$this->db->join('category_table', 'products.category_id = category_table.id');
		$query = $this->db->get();
		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//select all products
	public function selectAllProducts(){
		$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
		$this->db->from('products');
		$this->db->order_by('products.id',"ASC");
		$this->db->join('category_table', 'products.category_id = category_table.id');

		$query = $this->db->get();
		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//select single product
	public function getSingleProduct($credentials){
		$this->db->select('*,products.id as product_id, category_table.id as categoryid, category_table.category as category');
		$this->db->from('products');
		$this->db->join('category_table', 'products.category_id = category_table.id');
		$this->db->where('products.id', $credentials['product_id']);

		$query = $this->db->get();

		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//edit product
	public function updateProduct($credentials){
		$this->db->set('product_name',$credentials['product_name']);
		$this->db->set('product_description',$credentials['product_description']);
		$this->db->set('product_status',$credentials['product_status']);
		$this->db->set('category_id',$credentials['category_id']);

		$this->db->where('id',$credentials['id']);

		if ($this->db->update('products')) {
            return true;
        }
        else{
            return false;
        }
	}

	//disable product
	public function disable($credentials){
		$this->db->set('product_status',$credentials['product_status']);

		$this->db->where('id',$credentials['product_id']);

		if ($this->db->update('products')) {
            return true;
        }
        else{
            return false;
        }
	}

	//enable product
	public function enable($credentials){
		$this->db->set('product_status',$credentials['product_status']);

		$this->db->where('id',$credentials['product_id']);

		if ($this->db->update('products')) {
            return true;
        }
        else{
            return false;
        }
	}

	//delete product
	public function deleteOne($credentials){
		$this->db->where('id',$credentials['product_id']);
        if ($this->db->delete('products')) {
            return true;
        }
        else{
            return false;
        }
	}

	public function totalRows(){
		$query = $this->db->get('products');
		$count=$query->num_rows();
		if ($count > 0) {
			return $count;
		}
		else{
			return FALSE;
		}
	}

	public function selectPaginatedProducts($limit,$offset){
		$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
		$this->db->from('products');
		$this->db->order_by('products.id',"ASC");
		$this->db->limit($limit,$offset);
		$this->db->join('category_table', 'products.category_id = category_table.id');

		$query = $this->db->get();
		if (!empty($query->result_array())) {
            return $query->result_array();
        }
        else{
            return false;
        }
	}

	//search
	public function searchProduct($value,$option){
		$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
		$this->db->from('products');
		$this->db->order_by('products.id',"ASC");
		$this->db->join('category_table', 'products.category_id = category_table.id');
		if ($value=='' && $option==0) {
			$query = $this->db->get();
			return $query->result_array();
		}
		else if ($value=='' && $option!=0) {
			$this->db->where('category_id',$option);
			$query = $this->db->get();
			return $query->result_array();
		}
		else if ($value!='' && $option==0) {
			$this->db->like('product_name', $value);
			$query = $this->db->get();
			return $query->result_array();
		}
		else{
			$this->db->where('category_id',$option);
			$this->db->like('product_name', $value);

			$query = $this->db->get();
			return $query->result_array();
		}
	}
}



// //search
// 	public function searchProduct($value,$option){
// 		$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
// 		$this->db->from('products');
// 		$this->db->order_by('products.id',"ASC");
// 		$this->db->join('category_table', 'products.category_id = category_table.id');
// 		if ($value=='' && $option==0) {
// 			$query = $this->db->get();
// 			return $query->result_array();
// 		}
// 		else if ($value='' && $option!=0) {
// 			$this->db->where('category_id',$option);
// 			$query = $this->db->get();
// 			return $query->result_array();
// 		}
// 		else{
// 			$this->db->where('category_id',$option);
// 			$this->db->like('product_name', $value);

// 			$query = $this->db->get();
// 			return $query->result_array();
// 		}



// 		if ($value=='') {
// 			if ($option==0) {
// 				$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
// 				$this->db->from('products');
// 				$this->db->order_by('products.id',"ASC");
// 				$this->db->join('category_table', 'products.category_id = category_table.id');

// 				$query = $this->db->get();
// 				if (!empty($query->result_array())) {
// 		            return $query->result_array();
// 		        }
// 		        else{
// 		            return false;
// 		        }
// 			}
// 			else{
// 				$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
// 				$this->db->from('products');
// 				$this->db->order_by('products.id',"ASC");
// 				$this->db->join('category_table', 'products.category_id = category_table.id');
// 				$this->db->where('category_id',$option);

// 				$query = $this->db->get();
// 				if (!empty($query->result_array())) {
// 		            return $query->result_array();
// 		        }
// 		        else{
// 		            return false;
// 		        }
// 			}
// 		}
// 		else{
// 			if ($option==0) {
// 				$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
// 				$this->db->from('products');
// 				$this->db->order_by('products.id',"ASC");
// 				$this->db->join('category_table', 'products.category_id = category_table.id');
// 				$this->db->like('product_name', $value);

// 				$query = $this->db->get();
// 				if (!empty($query->result_array())) {
// 		            return $query->result_array();
// 		        }
// 		        else{
// 		            return false;
// 		        }
// 			}
// 			else{
// 				$this->db->select("*,products.id as product_id, category_table.id as categoryid, category_table.category as category");
// 				$this->db->from('products');
// 				$this->db->order_by('products.id',"ASC");
// 				$this->db->join('category_table', 'products.category_id = category_table.id');
// 				$this->db->where('category_id',$option);
// 				$this->db->like('product_name', $value);


// 				$query = $this->db->get();
// 				if (!empty($query->result_array())) {
// 		            return $query->result_array();
// 		        }
// 		        else{
// 		            return false;
// 		        }

// 			}
			

// 		}
// 	}