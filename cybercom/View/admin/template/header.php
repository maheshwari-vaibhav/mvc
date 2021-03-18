<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="navbar-nav">
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','product'); ?>">Product</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','category'); ?>">Category</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','customer'); ?>">Customer</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','payment'); ?>">Payment</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','shipping'); ?>">Shipping</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl('grid','admin'); ?>">Admin</a>
				    </li>
				</ul>
			</div>
		</nav>
	</header>
