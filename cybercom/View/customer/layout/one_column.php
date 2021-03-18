<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->createBlock('Customer_Layout_Head')->toHtml(); ?>
	</head>
	<body id="bd" class=" cms-index-index4 header-style4 prd-detail cms-simen-home-page-v2 default cmspage">
		<div id="sns_wrapper">  
			<div class="container-fluid px-0" style="overflow: hidden;">
				<div class="row no-gutters">
					<div class="col">
						<?php echo $this->getChild('header')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col" id="message">
						<?php echo $this->createBlock('Core_Layout_Message')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $this->getChild('content')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $this->getChild('footer')->toHtml(); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
