<div id="contentHtml">
	
	<?php 
		foreach ($this->getChildren() as $child) {
			echo $child->toHtml();
		}
	?>	
</div>