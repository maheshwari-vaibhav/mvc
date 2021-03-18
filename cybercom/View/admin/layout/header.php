<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navigation">
			<ul class="navbar-nav">
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_product') ?>').resetParms().setMethod('post').load();">Product</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_category') ?>').resetParms().setMethod('post').load();">Category</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_customer') ?>').resetParms().setMethod('post').load();">Customer</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_payment') ?>').resetParms().setMethod('post').load();">Payment</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_shipping') ?>').resetParms().setMethod('post').load();">Shipping</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_admin') ?>').resetParms().setMethod('post').load();">Admin</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_customer_group') ?>').resetParms().setMethod('post').load();">Customer Group</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_cmspage') ?>').resetParms().setMethod('post').load();">Cms Page</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_attribute') ?>').resetParms().setMethod('post').load();">Attribute</a>
			    </li>
			</ul>
		</div>
	</nav>
</header>
