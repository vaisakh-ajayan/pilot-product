<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>main page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sample.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/table.css'); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!--font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!--table-->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<!--forms-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/myform.css'); ?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link"><?php echo "hello ". $this->session->userdata('email'); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Register</a>
				</li>
				<!-- <li class="nav-item">
					<a href="">
						<?php if(!empty($userdata)){ echo "login"; } ?>
					</a>
					
				</li>
				<li class="nav-item">
					<a href="">
						<?php if(empty($userdata)){ echo "logout"; } ?>
					</a>
					
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="">
						<span>Login<i class="fas fa-sign-in-alt"></i></span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('logout'); ?>">
						<span>Logout<i class="fas fa-sign-out-alt"></i></span>
					</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<select id="drp" class="selectpicker form-control" data-style="drp-cat">
							<option value="0">All</option>
							<?php foreach($categoryValues as $key) {?>
								<option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>	
							<?php } ?> 
						</select>
					</div>
					<div class="form-group has-white">
						<input id="search-box" type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
						<i class="material-icons">search</i>
					</button>
				</div>
			</form>
		</div>
	</nav>
	<div class="container-fluid outer">
		<div class="">
			<div class="card card-top float-right">
				<div class="card-body but-contain">
					<a id="add-main-pro" href="" class="btn btn-info card-link">Add products <i class="fas fa-plus-circle"></i></a>
					<a id="add-main-cat" href="" class="btn btn-info card-link">Add category <i class="fas fa-plus-circle"></i></a>
				</div>
			</div>
			<h1 class="text-center text-secondary head-margin">Welcome Admin</h1>
			<hr>
		</div>
		<div class="row">
			<div class="col-lg-7 col-12">
				<h2 class="text-center text-secondary mt-2">Products List</h2>
				<div class="list-div p-1">

					<section class="ftco-section">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="table-wrap">
										<table class="table">
											<thead class="thead-dark">
												<tr>
													<th>Product</th>
													<th>Category</th>
													<th>Added on</th>
													<th>Status</th>
													<th>View</th>
													<th>Edit</th>
													<th>Delete</th>
													<th>Enable/<br>Disable</th>
												</tr>
											</thead>
											<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</section>

						<div class="pagination-div">

						</div>
					</div>
				</div>
				<div class="col-lg-5 col-12">
					<!--forms-->
					<div class="detail-div">
						<!--add category-->
						<div class="category-div wrap m-4" style="display:none;">
							<div class="card card-5">
								<div class="card-header ct-h">
									<h3 class="text-center cat-ttl">Category Form</h3>
								</div>
								<div class="card-body ct-b">
									<span class="category-result"></span>
									<form method="POST" id="form-cat">
										<div class="form-group">
											<label for="cat" class="lab-cat">Category</label>
											<input id="cat" class="form-control inp-cat" type="text" name="category">
										</div>
										<span class="text-danger"><?php echo form_error('categoryName'); ?></span>
										<span class="text-danger cat-validation"></span>
										<div class="form-group mt-5">
											<input class="btn btn-lg btn-outline-primary" type="submit" value="Add Category">
										</div>
									</form>

								</div>
							</div>
						</div>
						<!--add-category form end-->
						<!--add products-->
						<div class="product-add-div wrap m-4" style="display:none">
							<div class="card card-5">
								<div class="card-header ct-h">
									<h3 class="text-center cat-ttl">Products Form</h3>
								</div>
								<div class="card-body ct-b">
									<span class="product-result"></span>
									<form id="form-pro" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="pro-name" class="lab-cat">Product Name</label>
											<input id="pro-name" class="form-control inp-cat" type="text" name="productname">
										</div>
										<span class="text-danger error-pname"></span>
										<div class="form-group">
											<label for="pro-desc" class="lab-cat">Description</label>
											<textarea class="form-control inp-cat" rows="3" name="prodescription"></textarea>
										</div>
										<span class="text-danger error-pdesc"></span>
										<div class="form-check-inline mt-1 mb-1">
											<label class="lab-cat">Status</label>
											<label class="form-check-label ml-4 rd">
												<input type="radio" class="form-check-input" name="rad-status" value="1" checked="">Active
											</label>
											<label class="form-check-label ml-4 rd">
												<input type="radio" class="form-check-input" name="rad-status" value="0" >Inactive
											</label>
										</div>
										<span class="text-danger error-pstatus"></span>
										<div class="form-group">
											<label class="lab-cat">Category</label>
											<div class="select-box">
												<select id="box" sct="" class="selectpicker form-control" data-style="inp-cat">
													<?php foreach($categoryValues as $key) {?>
														<option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>	
													<?php } ?>
												</select>
											</div>

										</div>
										<span class="text-danger error-pcategory"></span>
										<div class="form-group">
											<label class="lab-cat">Product Image</label>
											<div class="custom-file">
												<input type="file" class=" custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
										<span class="text-danger error-pimgage"></span>
										<div class="form-group mt-5">
											<input class="btn btn-lg btn-outline-primary" type="submit" value="Submit">
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--products form ends-->
						<!--view products start-->
						<div class="view-div wrap m-4" style="display:none;">
							<div class="card card-5">
								<div class="card-header ct-h">
									<h3 class="text-center cat-ttl">Product Details</h3>
								</div>
								<div class="card-body ct-b">
									<div>
										<img class="img-disp" src="" style="object-fit:fill" alt="">
									</div>
									<div>
										<h3 class="view-pro-name"></h3>
									</div>
									<div>
										<h5 class="view-desc"></h5>
									</div>
									<div>
										<p>Status   : <span class="view-status ml-4"></span></p>
										<p>Added on : <span class="view-date"></span></p>
									</div>
								</div>
							</div>
						</div>
						<!--view product ends-->
						<!--edit product form starts-->
						<div class="edit-div wrap m-4" style="display:none">
							<div class="card card-5">
								<div class="card-header ct-h">
									<h3 class="text-center cat-ttl">Edit Products Form</h3>
								</div>
								<div class="card-body ct-b">
									<span class="edit-result"></span>
									<form id="edit-pro" given="" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="edit-name" class="lab-cat">Product Name</label>
											<input id="edit-name" class="form-control inp-cat" type="text" name="productname">
										</div>
										<span class="text-danger edit-err-pname"></span>
										<div class="form-group">
											<label for="edit-desc" class="lab-cat">Description</label>
											<textarea id="edit-desc" class="form-control inp-cat" rows="3" name="prodescription"></textarea>
										</div>
										<span class="text-danger edit-err-pdesc"></span>
										<div class="form-check-inline mt-1 mb-1">
											<label class="lab-cat">Status</label>
											<label class="form-check-label ml-4 rd">
												<input type="radio" class="edit-active form-check-input" name="ed-status" value="1" checked="">Active
											</label>
											<label class="form-check-label ml-4 rd">
												<input type="radio" class="edit-inactive form-check-input" name="ed-status" value="0" >Inactive
											</label>
										</div>
										<span class="text-danger edit-err-pstatus"></span>
										<div class="form-group">
											<label class="lab-cat">Category</label>
											<div class="select-box upd">
												<select id="edit-box" sct="" class="selectpicker form-control" data-style="inp-cat">
													<?php foreach($categoryValues as $key) {?>
														<option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>	
													<?php } ?>
												</select>
											</div>

										</div>
										<span class="text-danger edit-err-pcat"></span>
										<div>
											<img class="edit-image" src="" style="object-fit:fill" alt="">
										</div>
										<div class="form-group">
											<label class="lab-cat">Product Image</label>
											<div class="custom-file">
												<input type="file" class=" custom-file-input" id="editFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
										<span class="text-danger edit-err-pimg"></span>
										<div class="form-group mt-5">
											<input class="edit-submit btn btn-lg btn-outline-primary" type="submit" value="Submit">
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--delete confirmation model-->
		<div class="modal fade stick-up" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">

						<h4 class="modal-title">Delete Confirmation</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">

						Are you sure you want to delete this product if deleted this data will no longer be available.

					</div>
					<div class="modal-footer">
						<a class="btn btn-danger btn-cons  pull-left inline btn-sm" id="delete-product-button" delete-product-id="">Delete</a>
						<button data-dismiss="modal" class="btn btn-info btn-cons no-margin pull-right inline btn-sm" type="button">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!--message modal-->
		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="information">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content" id="info-content">
		 		
		    </div>
		  </div>
		</div>
		<script src="<?php echo base_url('assets/js/selectPick.js') ?>"></script>

		<script type="text/javascript">
		
		$(document).ready(function(){

			//jquery for loading items on first
			$.ajax({
				type:'GET',
				dataType:'json',
				url:"<?php echo base_url('products'); ?>",
				success:function(response){
        			$('.pagination-div').html(response.pageLinks);
        			$('tbody').empty();
        			jQuery.each(response.productValues,function(index,item){

        				$('tbody').append('<tr id="'+item.product_id+'" class="alert" role="alert"></tr>');

        				var row = $('#'+item.product_id);
        				$('#'+item.product_id).append(
        					'<td><strong>'+item.product_name+'</strong></td>'+
        					'<td>'+item.category+'</td>'+
        					'<td>'+item.date_added+'</td>'
        					);

        				var row = $('#'+item.product_id);
        				if (item.product_status=='1') {
        					$('#'+item.product_id).append('<td class="text-success">Active</td>');
        				}
        				else{
        					$('#'+item.product_id).append('<td class="text-danger">Inactive</td>');
        				}

        				var row = $('#'+item.product_id);
        				$('#'+item.product_id).append(
        					'<td><a href="" class="display-product" vp="'+item.product_id+'"><span><i class="far fa-eye text-info"></i></span></a></td>'+
        					'<td><a href="" class="edit" ep="'+item.product_id+'"><span><i class="far fa-edit"></i></span></a></td>'+
        					'<td><a href="" class="del" dp="'+item.product_id+'" data-toggle="modal" data-target="#myModal1"><span><i class="far fa-trash-alt text-danger"></span></a></td>'
        					);

        				var row = $('#'+item.product_id);
        				if (item.product_status=='1') {
        					$('#'+item.product_id).append('<td><a class="disable-btn btn btn-sm btn-outline-warning" stb="'+item.product_id+'">Disable</a></td>');
        				}
        				else{
        					$('#'+item.product_id).append('<td><a class="enable-btn btn btn-sm btn-outline-success" stb="'+item.product_id+'">Enable</a></td>');
        				}

        			});

        		},
        		error:function(response){
        			alert('an error occured');
        		}
        	});

        	//jquery on paginations
        	$('.pagination-div').on('click','.page-link',function(e){
        		e.preventDefault();
        		var myurl = $(this).attr('href');

        		$.ajax({
        			type:'GET',
        			dataType:'json',
        			url:myurl,
        			success:function(response){
        				$('.pagination-div').html(response.pageLinks);
        				$('tbody').empty();
        				jQuery.each(response.productValues,function(index,item){
        					
        					$('tbody').append('<tr id="'+item.product_id+'" class="alert" role="alert"></tr>');

        					var row = $('#'+item.product_id);
        					$('#'+item.product_id).append(
        						'<td><strong>'+item.product_name+'</strong></td>'+
        						'<td>'+item.category+'</td>'+
        						'<td>'+item.date_added+'</td>'
        						);

        					var row = $('#'+item.product_id);
        					if (item.product_status=='1') {
        						$('#'+item.product_id).append('<td class="text-success">Active</td>');
        					}
        					else{
        						$('#'+item.product_id).append('<td class="text-danger">Inactive</td>');
        					}

        					var row = $('#'+item.product_id);
        					$('#'+item.product_id).append(
        						'<td><a href="" class="display-product" vp="'+item.product_id+'"><span><i class="far fa-eye text-info"></i></span></a></td>'+
        						'<td><a href="" class="edit" ep="'+item.product_id+'"><span><i class="far fa-edit"></i></span></a></td>'+
        						'<td><a href="" class="del" dp="'+item.product_id+'" data-toggle="modal" data-target="#myModal1"><span><i class="far fa-trash-alt text-danger"></span></a></td>'
        						);
        					
        					var row = $('#'+item.product_id);
        					if (item.product_status=='1') {
        						$('#'+item.product_id).append('<td><a class="disable-btn btn btn-sm btn-outline-warning" stb="'+item.product_id+'">Disable</a></td>');
        					}
        					else{
        						$('#'+item.product_id).append('<td><a class="enable-btn btn btn-sm btn-outline-success" stb="'+item.product_id+'">Enable</a></td>');
        					}
        					
        				});

        			},
        			error:function(response){
        				alert('an error occured');
        			}
        		});
        	});


			//button click on add category
			$('#add-main-cat').click(function(e){
				e.preventDefault();
				$('.product-add-div').hide();
				$('.view-div').hide();
				$('.edit-div').hide();
				$('.category-div').attr('style','display:block');
			});


			//button click on add products
			$('#add-main-pro').click(function(e){
				e.preventDefault();
				$('.category-div').hide();
				$('.view-div').hide();
				$('.edit-div').hide();
				$('.product-add-div').show();
			});

			//category form submit
			$('#form-cat').submit(function(e){
				e.preventDefault();
				var categoryName=$("input[name='category']",this).val();

				$.ajax({
					type:'POST',
					dataType:'json',
					url:"<?php echo base_url('addcategory'); ?>",
					data:{
						categoryName:categoryName
					},
					success:function(response){
						if (response.result=='success') {
							$('.cat-validation').empty();
							if (response.error=="true") {
								$('.category-result').removeClass('text-success');
								$('.category-result').addClass('text-danger');
								$('.category-result').html(response.message);
								setTimeout(function(){
									$('.category-result').empty();
								},3000);
							}
							else{
								$('.category-result').removeClass('text-danger');
								$('.category-result').addClass('text-success');
								$('.category-result').html(response.message);

								jQuery.each(response.categoryValues, function(index, item) {
									$('#box').append(`<option value="${item['id']}">
										${item['category']}
										</option>`);

									$('#drp').append('<option value="'+item['id']+'">'+
										item['category']+
										'</option>');
									$('#edit-box').append('<option value="'+item['id']+'">'+
										item['category']+
										'</option>');

									$('.select-box select').selectpicker('refresh');
									$('.input-group-prepend select').selectpicker('refresh');

								    // $('#box option:last-child').attr("value",item.id)
								});
								setTimeout(function(){
									$('.category-result').empty();
								},3000);
							}
						}
						else if (response.result=='failed') {
							$('.category-result').empty();
							$('.cat-validation').html(response.catValError)
						}

					},
					error:function(response){
						alert("an error occured");
					}
				})

			});

			//search
			$('#search-box').on('keyup',function(){
				var value=$(this).val();
				var option = $('#drp').val();
				
				$.ajax({
					type:'POST',
					dataType:'json',
					url:"<?php echo base_url('search'); ?>",
					data:{
						'value':value,
						'option':option
					},
					success:function(response){
						$('tbody').empty();
						jQuery.each(response.productValues,function(index,item){
							
							$('tbody').append('<tr id="'+item.product_id+'" class="alert" role="alert"></tr>');

							var row = $('#'+item.product_id);
							$('#'+item.product_id).append(
								'<td><strong>'+item.product_name+'</strong></td>'+
								'<td>'+item.category+'</td>'+
								'<td>'+item.date_added+'</td>'
								);

							var row = $('#'+item.product_id);
							if (item.product_status=='1') {
								$('#'+item.product_id).append('<td class="text-success">Active</td>');
							}
							else{
								$('#'+item.product_id).append('<td class="text-danger">Inactive</td>');
							}

							var row = $('#'+item.product_id);
							$('#'+item.product_id).append(
								'<td><a href="" class="display-product" vp="'+item.product_id+'"><span><i class="far fa-eye text-info"></i></span></a></td>'+
								'<td><a href="" class="edit" ep="'+item.product_id+'"><span><i class="far fa-edit"></i></span></a></td>'+
								'<td><a href="" class="del" dp="'+item.product_id+'" data-toggle="modal" data-target="#myModal1"><span><i class="far fa-trash-alt text-danger"></span></a></td>'
								);
							
							var row = $('#'+item.product_id);
							if (item.product_status=='1') {
								$('#'+item.product_id).append('<td><a class="disable-btn btn btn-sm btn-outline-warning" stb="'+item.product_id+'">Disable</a></td>');
							}
							else{
								$('#'+item.product_id).append('<td><a class="enable-btn btn btn-sm btn-outline-success" stb="'+item.product_id+'">Enable</a></td>');
							}
							
						});


					},
					error:function(response){
						alert('an error occured');
					}
				})
			});


		});

		//button click view products
		$('table').on('click','.display-product',function(e){
			e.preventDefault();
			var id = $(this).attr('vp');
			$('.category-div').hide();
			$('.product-add-div').hide();
			$('.edit-div').hide();
			$('.view-div').show();
			
			$.ajax({
				type:'POST',
				dataType:'json',
				url:"<?php echo base_url('productdetails'); ?>",
				data:{
					id:id
				},
				success:function(response){
					if (response.result=="success") {
						jQuery.each(response.proDetails,function(index,item){
						
							$('.img-disp').attr('src',item.product_image);
							$('.img-disp').attr('alt',item.product_image);
							$('.view-pro-name').text(item.product_name);
							$('.view-desc').text(item.product_description);
							if (item.product_status==1) {
								$('.view-status').text('Active');
							}
							else{
								$('.view-status').text('Inactive');
							}
							
							$('.view-date').text(item.date_added);
						})
					}
					else{
						alert(response.message);
					}
				},
				error:function(response){
					alert("an error occured");
				}
			})
		});
		//product form submit
		$('#form-pro').submit(function(e){
			e.preventDefault();
			var productName=$("input[name='productname']").val();
			var productDesc=$("textarea[name='prodescription']").val();
			var status=$("input[name='rad-status']:checked").val();
			var prodCategory=$("#box").val();
			var image=$("#customFile").val();

			$.ajax({
				type:'POST',
				dataType:'json',
				url:"<?php echo base_url('addproduct'); ?>",
				data:{
					productName:productName,
					productDesc:productDesc,
					status:status,
					prodCategory:prodCategory,
					image:image
				},
				success:function(response){
					if (response.result=="success") {
						$('.error-pname').empty();
						$('.error-pdesc').empty();
						$('.error-pstatus').empty();
						$('.error-pcategory').empty();
						$('.error-pimgage').empty();
						$('.product-result').removeClass('text-danger');
						$('.product-result').addClass('text-success');
						$('.product-result').html(response.message);
						// $('#info-content').html(response.message);
						// $('#information').modal('show');

						//newly added product giving to dom
						jQuery.each(response.productValues,function(index,item){

							$('tbody').append('<tr id="'+item.product_id+'" class="alert" role="alert"></tr>');

							var row = $('#'+item.product_id);
							$('#'+item.product_id).append(
								'<td><strong>'+item.product_name+'</strong></td>'+
								'<td>'+item.category+'</td>'+
								'<td>'+item.date_added+'</td>'
								);

							var row = $('#'+item.product_id);
							if (item.product_status=='1') {
								$('#'+item.product_id).append('<td class="text-success">Active</td>');
							}
							else{
								$('#'+item.product_id).append('<td class="text-danger">Inactive</td>');
							}

							var row = $('#'+item.product_id);
							$('#'+item.product_id).append(
								'<td><a href="" class="display-product" vp="'+item.product_id+'"><span><i class="far fa-eye text-info"></i></span></a></td>'+
								'<td><a href="" class="edit" ep="'+item.product_id+'"><span><i class="far fa-edit"></i></span></a></td>'+
								'<td><a href="" class="del" dp="'+item.product_id+'" data-toggle="modal" data-target="#myModal1"><span><i class="far fa-trash-alt text-danger"></span></a></td>'
								);
							
							var row = $('#'+item.product_id);
							if (item.product_status=='1') {
								$('#'+item.product_id).append('<td><a class="disable-btn btn btn-sm btn-outline-warning" stb="'+item.product_id+'">Disable</a></td>');
							}
							else{
								$('#'+item.product_id).append('<td><a class="enable-btn btn btn-sm btn-outline-success" stb="'+item.product_id+'">Enable</a></td>');
							}
							
						});

						setTimeout(function(){
							$('.product-result').empty();
							// $('#information').modal('hide');
						},3000);
					}
					else{

						$('.product-result').empty();
						//if image upload failed
						if (response.error=="true") {
							$('.error-pimgage').html(response.imageError);
						}
						else if (response.internalErr=="true") {
							$('.error-pname').empty();
							$('.error-pdesc').empty();
							$('.error-pstatus').empty();
							$('.error-pcategory').empty();
							$('.error-pimgage').empty();
							$('.product-result').removeClass('text-success');
							$('.product-result').addClass('text-danger');
							$('.product-result').html(response.message);
							setTimeout(function(){
								$('.product-result').empty();
							},3000);
						}
						else{
							$('.error-pname').html(response.valErrors.nameError);
							$('.error-pdesc').html(response.valErrors.descError);
							$('.error-pstatus').html(response.valErrors.statusError);
							$('.error-pcategory').html(response.valErrors.categoryError);
						}
					}

				},
				error:function(){
					alert("an error occured");
				}
			})

		});


		//js for input field
		$('#customFile').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

		$('#editFile').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        //edit button click
        $('table').on('click','.edit',function(e){
        	e.preventDefault();
        	$('.category-div').hide();
        	$('.view-div').hide();
        	$('.product-add-div').hide();

        	var id = $(this).attr('ep');

        	$.ajax({
        		type:'GET',
        		dataType:'json',
        		url:"<?php echo base_url('editproduct'); ?>",
        		data:{
        			id:id
        		},
        		success:function(response){
        			if (response.result=='success') {
        				$('.edit-div').show();
        				jQuery.each(response.proDetails,function(index,item){
							// $('#e-name').attr('value',item.product_name);
							$('#edit-name').val(item.product_name);
							$('#edit-desc').val(item.product_description);
							if (item.product_status=='1') {
								$('.edit-active').prop('checked',true);
								$('.edit-inactive').prop('checked',false);
							}
							else{
								$('.edit-active').prop('checked',false);
								$('.edit-inactive').prop('checked',true);
							}

							// $("select option[value='"+item.category_id+"']").attr("selected","selected");
							$('#edit-box').val(item.category_id);
							$('.upd select').selectpicker('refresh');
							$('.edit-image').attr('src',item.product_image);
							$('.edit-image').attr('alt',item.product_image);
							$('#edit-pro').attr('given',item.product_id);

						})
					}
					else{
						alert(response.message);
					}
				},
				error:function(response){
					alert("an error occured");
				}
			})
        })


        //edit subnit
        $('.edit-div').on('click','.edit-submit',function(e){
        	e.preventDefault();
        	var productName=$("#edit-name").val();
        	var productDesc=$("#edit-desc").val();
        	var status=$("input[name='ed-status']:checked").val();
        	var prodCategory=$("#edit-box").val();
        	var image=$("#editFile").val();
			var id=$("#edit-pro").attr('given'); //product id

			$.ajax({
				type:'POST',
				dataType:'json',
				url:"<?php echo base_url('editproduct'); ?>",
				data:{
					productId:id,
					productName:productName,
					productDesc:productDesc,
					status:status,
					prodCategory:prodCategory,
					image:image
				},
				success:function(response){
					if (response.result=="success") {
						$('.edit-err-pname').empty();
						$('.edit-err-pdesc').empty();
						$('.edit-err-pstatus').empty();
						$('.edit-err-pcat').empty();
						$('.edit-err-pimg').empty();
						$('.edit-result').removeClass('text-danger');
						$('.edit-result').addClass('text-success');
						$('.edit-result').html(response.message);

						jQuery.each(response.productDetails,function(index,item){
							$("#"+item.product_id+" td:nth-child(1) strong").text(item.product_name);
							$("#"+item.product_id+" td:nth-child(2)").text(item.category
								);
							// $("#"+item.product_id+" td:nth-child(2)").text(item.product_description);

							if (item.product_status=='1') {
								$("#"+item.product_id+" td:nth-child(4)").html("Active");
								$("#"+item.product_id+" td:nth-child(4)").removeClass("text-danger");
								$("#"+item.product_id+" td:nth-child(4)").addClass("text-success");

								$("#"+item.product_id+" td:nth-child(8) a").html('Disable');
								$("#"+item.product_id+" td:nth-child(8) a").removeClass("btn-outline-success");
								$("#"+item.product_id+" td:nth-child(8) a").addClass("btn-outline-warning");
								$("#"+item.product_id+" td:nth-child(8) a").removeClass("enable-btn");
								$("#"+item.product_id+" td:nth-child(8) a").addClass("disable-btn");
							}
							else if (item.product_status=='0') {
								$("#"+item.product_id+" td:nth-child(4)").html("Inactive");
								$("#"+item.product_id+" td:nth-child(4)").removeClass("text-success");
								$("#"+item.product_id+" td:nth-child(4)").addClass("text-danger");

								$("#"+item.product_id+" td:nth-child(8) a").html('Enable');
								$("#"+item.product_id+" td:nth-child(8) a").removeClass("btn-outline-warning");
								$("#"+item.product_id+" td:nth-child(8) a").addClass("btn-outline-success");
								$("#"+item.product_id+" td:nth-child(8) a").removeClass("disable-btn");
								$("#"+item.product_id+" td:nth-child(8) a").addClass("enable-btn");
							}

						})
						setTimeout(function(){
							$('.edit-result').empty();
						},3000);

					}
					else{
						$('.edit-result').empty();
						if (response.error=="true") {
							$('.edit-er-pimg').html(response.imageError);
						}
						else if (response.internalErr=="true") {
							$('.edit-err-pname').empty();
							$('.edit-err-pdesc').empty();
							$('.edit-err-pstatus').empty();
							$('.edit-err-pcat').empty();
							$('.edit-err-pimg').empty();
							$('.edit-result').removeClass('text-success');
							$('.edit-result').addClass('text-danger');
							$('.edit-result').html(response.message);
							setTimeout(function(){
								$('.edit-result').empty();
							},3000);
						}
					}

				},
				error:function(response){
					alert("an error occured");
				}
			})
        })

        //disable button click
        $('table').on('click','.disable-btn',function(e){
        	e.preventDefault();
        	var productId=$(this).attr('stb');
        	

        	$.ajax({
        		type:'POST',
        		dataType:'json',
        		url:"<?php echo base_url('disable'); ?>",
        		data:{
        			productId:productId
        		},
        		success:function(response){
        			if (response.result=='failed') {
        				alert(response.message)
        			}
        			else if (response.result=='success') {
        				$("#"+productId+" td:nth-child(4)").html("Inactive");
        				$("#"+productId+" td:nth-child(4)").toggleClass("text-success text-danger");

        				$("#"+productId+" td:nth-child(8) a").html('Enable');
        				$("#"+productId+" td:nth-child(8) a").toggleClass("btn-outline-warning btn-outline-success");
        				$("#"+productId+" td:nth-child(8) a").toggleClass("disable-btn enable-btn");
        			}

        		},
        		error:function(response){
        			alert("an error occured");
        		}
        	})
        });

        //enable button
        $('table').on('click','.enable-btn',function(e){
        	e.preventDefault();
        	var productId=$(this).attr('stb');

        	$.ajax({
        		type:'POST',
        		dataType:'json',
        		url:"<?php echo base_url('enable'); ?>",
        		data:{
        			productId:productId
        		},
        		success:function(response){
        			if (response.result=='failed') {
        				alert(response.message);
        			}
        			else if (response.result=='success') {
        				$("#"+productId+" td:nth-child(4)").html("Active");
        				$("#"+productId+" td:nth-child(4)").toggleClass("text-danger text-success");

        				$("#"+productId+" td:nth-child(8) a").html('Disable');
        				$("#"+productId+" td:nth-child(8) a").toggleClass("btn-outline-success btn-outline-warning");
        				$("#"+productId+" td:nth-child(8) a").toggleClass("enable-btn disable-btn");
        			}

        		},
        		error:function(response){
        			alert("an error occured");
        		}
        	})
        });


        //delete button
        $('.del').click(function(){
        	var productId=$(this).attr('dp');
        	// $('#delete-product-button').attr('delete-product-button',productId);
        	$('#delete-product-button').click(function(e){
        		e.preventDefault();
        		$.ajax({
        			type:'POST',
        			dataType:'json',
        			url:"<?php echo base_url('delete'); ?>",
        			data:{
        				productId:productId
        			},
        			success:function(response){
        				if (response.result=="failed") {
        					alert(response.message);
        				}
        				else if (response.result=="success") {
        					$('#myModal1').modal('hide');
        					$('#'+productId).fadeOut().remove();
        				}

        			},
        			error:function(response){
        				$('#myModal1').modal('hide');
        				alert("an error occured");
        			}
        		})
        	})
        });

    </script>
</body>
</html>