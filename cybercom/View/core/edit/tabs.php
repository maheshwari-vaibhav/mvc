<ul class="nav flex-column">
	<?php foreach ($this->getTabs() as $key => $tab): ?>
		<li class="nav-item bg-primary mt-2" style="cursor: pointer;">
	    <a class="nav-link text-white" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['tab'=> $key]); ?>').setMethod('post').resetParms().load();" ><?=$tab['label']?></a>
	  </li>
	<?php endforeach ?>
</ul>