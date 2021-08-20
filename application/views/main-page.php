<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>main page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sample.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/table.css'); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!--font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!--table-->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
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
						<button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Category One</a>
							<a class="dropdown-item" href="#">Category Two</a>
							<a class="dropdown-item" href="#">Category Three</a>
							<div role="separator" class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Separated Category</a>
						</div>
					</div>
					<div class="form-group has-white">
						<input type="text" class="form-control" placeholder="Search">
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
					<a href="" class="btn btn-info card-link">Add products <i class="fas fa-plus-circle"></i></a>
					<a href="" class="btn btn-info card-link">Add category <i class="fas fa-plus-circle"></i></a>
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
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</section>

					<div>
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-12">
			<!-- <div class="card card-right">
				<div class="card-body but-contain">
					<a href="" class="btn btn-info card-link">Add products <i class="fas fa-plus-circle"></i></a>
					<a href="" class="btn btn-info card-link">Add category <i class="fas fa-plus-circle"></i></a>
				</div>
			</div> -->
			<div class="detail-div">
				
			</div>
		</div>
	</div>
</div>
</body>
</html>