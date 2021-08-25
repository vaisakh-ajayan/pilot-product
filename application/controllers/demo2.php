<tr class="alert" role="alert">
	<td><strong>product 1</strong></td>
	<td>Electronics</td>
	<td>01/01/2021</td>
	<td class="text-success">Active</td>
	<td>
		<a href="">
			<span><i class="far fa-eye text-info"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-edit"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-trash-alt text-danger"></i></span>
		</a>
	</td>
	<td>
		<a href="" class="btn btn-sm btn-outline-warning">Disable</a>
	</td>
</tr>
<tr class="alert" role="alert">
	<td><strong>product 2</strong></td>
	<td>Grocery</td>
	<td>10/10/2020</td>
	<td class="text-danger">Inactive</td>
	<td>
		<a href="">
			<span><i class="far fa-eye text-info"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-edit"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-trash-alt text-danger"></i></span>
		</a>
	</td>
	<td>
		<a href="" class="btn btn-sm btn-outline-success">Enable</a>
	</td>
</tr>
<tr class="alert" role="alert">
	<td><strong>product 3</strong></td>
	<td>Food</td>
	<td>25/04/2021</td>
	<td class="text-success">Active</td>
	<td>
		<a href="">
			<span><i class="far fa-eye text-info"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-edit"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-trash-alt text-danger"></i></span>
		</a>
	</td>
	<td>
		<a href="" class="btn btn-sm btn-outline-warning">Disable</a>
	</td>
</tr>
<tr class="alert" role="alert">
	<td><strong>product 2</strong></td>
	<td>Grocery</td>
	<td>10/10/2020</td>
	<td class="text-danger">Inactive</td>
	<td>
		<a href="">
			<span><i class="far fa-eye text-info"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-edit"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-trash-alt text-danger"></i></span>
		</a>
	</td>
	<td>
		<a href="" class="btn btn-sm btn-outline-success">Enable</a>
	</td>
</tr>
<tr class="alert" role="alert">
	<td><strong>product 2</strong></td>
	<td>Grocery</td>
	<td>10/10/2020</td>
	<td class="text-danger">Inactive</td>
	<td>
		<a href="">
			<span><i class="far fa-eye text-info"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-edit"></i></span>
		</a>
	</td>
	<td>
		<a href="">
			<span><i class="far fa-trash-alt text-danger"></i></span>
		</a>
	</td>
	<td>
		<a href="" class="btn btn-sm btn-outline-success">Enable</a>
	</td>
</tr>







<!--add category-->
<div class="edit-div wrap m-4" style="display:none">
	<div class="card card-5">
		<div class="card-header ct-h">
			<h3 class="text-center cat-ttl">Edit Products Form</h3>
		</div>
		<div class="card-body ct-b">
			<span class="edit-result"></span>
			<form id="edit-pro" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="e-name" class="lab-cat">Product Name</label>
					<input id="e-name" class="form-control inp-cat" type="text" name="productname">
				</div>
				<span class="text-danger edit-er-pname"></span>
				<div class="form-group">
					<label for="e-desc" class="lab-cat">Description</label>
					<textarea id="e-desc" class="form-control inp-cat" rows="3" name="prodescription"></textarea>
				</div>
				<span class="text-danger edit-er-pdesc"></span>
				<div class="form-check-inline mt-1 mb-1">
					<label class="lab-cat">Status</label>
					<label class="form-check-label ml-4 rd">
						<input type="radio" class="e-act form-check-input" name="rad-status" value="1" checked="">Active
					</label>
					<label class="form-check-label ml-4 rd">
						<input type="radio" class="e-in form-check-input" name="rad-status" value="0" >Inactive
					</label>
				</div>
				<span class="text-danger edit-er-pstatus"></span>
				<div class="form-group">
					<label class="lab-cat">Category</label>
					<div class="select-box">
						<select id="edit-box" sct="" class="selectpicker form-control" data-style="inp-cat">
							<?php foreach($categoryValues as $key) {?>
								<option value="<?php echo $key['id']; ?>"><?php echo $key['category']; ?></option>	
							<?php } ?>
						</select>
					</div>

				</div>
				<span class="text-danger edit-er-pcat"></span>
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
				<span class="text-danger edit-er-pimg"></span>
				<div class="form-group mt-5">
					<input class="btn btn-lg btn-outline-primary" type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>


$('#form-pro').submit(function(e){
			e.preventDefault();
			var productName=$("input[name='productname']",this).val();
			var productDesc=$("textarea[name='prodescription']",this).val();
			var status=$("input[name='rad-status']:checked",this).val();
			var prodCategory=$("#box",this).val();
			var image=$("#customFile",this).val();
			console.log(productName, productDesc, prodCategory, status, image);

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
						console.log(response.message);
						console.log(response.date);
						$('.er-pname').empty();
						$('.er-pdesc').empty();
						$('.er-pstatus').empty();
						$('.er-pcat').empty();
						$('.er-pimg').empty();
						$('.product-result').removeClass('text-danger');
						$('.product-result').addClass('text-success');
						$('.product-result').html(response.message);

						//newly added product giving to dom
						jQuery.each(response.productValues,function(index,item){
							console.log(
								item.product_id,
								item.product_name,
								item.product_description,
								item.product_status,
								item.date_added,
								item.category_id,
								item.category,
								item.categoryid
								);

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
								'<td><a href="" class="disp" vp="'+item.product_id+'"><span><i class="far fa-eye text-info"></i></span></a></td>'+
								'<td><a href="" class="edit" ep="'+item.product_id+'"><span><i class="far fa-edit"></i></span></a></td>'+
								'<td><a href=""><span><i class="far fa-trash-alt text-danger"></span></a></td>'
								);
							
							var row = $('#'+item.product_id);
							if (item.product_status=='1') {
								$('#'+product_id).append('<td><a class="btn btn-sm btn-outline-warning">Disable</a></td>');
							}
							else{
								$('#'+item.product_id).append('<td><a class="btn btn-sm btn-outline-success">Enable</a></td>');
							}
							
						});

						setTimeout(function(){
							$('.product-result').empty();
						},3000);
					}
					else{

						console.log(response.valErrors);
						$('.product-result').empty();
						//if image upload failed
						if (response.error=="true") {
							$('.er-pimg').html(response.imageError);
						}
						else if (response.internalErr=="true") {
							$('.er-pname').empty();
							$('.er-pdesc').empty();
							$('.er-pstatus').empty();
							$('.er-pcat').empty();
							$('.er-pimg').empty();
							$('.product-result').removeClass('text-success');
							$('.product-result').addClass('text-danger');
							$('.product-result').html(response.message);
							setTimeout(function(){
								$('.product-result').empty();
							},3000);
						}
						else{
							$('.er-pname').html(response.valErrors.nameError);
							$('.er-pdesc').html(response.valErrors.descError);
							$('.er-pstatus').html(response.valErrors.statusError);
							$('.er-pcat').html(response.valErrors.categoryError);
						}
					}

				},
				error:function(){
					alert("an error occured");
				}
			})

		});