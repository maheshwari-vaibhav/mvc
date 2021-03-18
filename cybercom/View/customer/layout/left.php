<div id="leftHtml">
	<?php 
		foreach ($this->getChildren() as $child) {
			echo $child->toHtml();
		}
	?>
</div>