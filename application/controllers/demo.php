$categoryName=$this->input->post('categoryName');

$credentials=array(
'categoryName'=>$categoryName
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
		$data['result']="success";
		$data['error'] = "false";
		$data['message'] = "Category succesfully added";
		echo json_encode($data);
	}
}


<select id="box" sct="" class="selectpicker form-control" data-style="inp-cat">
	<option value="1">cat 1</option>
	<option value="2">cat 2</option>
	<option value="3">cat 3</option>
	<option value="4">cat4 </option>
	<option value="5">cat 5</option>
</select>

<?php foreach($categoryValues as $key) {?>
	<option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>	
<?php } ?>


<button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
<div class="dropdown-menu">
	<a class="dropdown-item" href="#">Category One</a>
	<a class="dropdown-item" href="#">Category Two</a>
	<a class="dropdown-item" href="#">Category Three</a>
	<div role="separator" class="dropdown-divider"></div>
	<a class="dropdown-item" href="#">Separated Category</a>
</div>

