<div class="container-fluid mt-3">
    <div class="row">
    	<div class="col-md-2">
    		<?php echo $this->getTabHtml(); ?>
    	</div>
        <div class="col-md-8 offset-md-1">
            <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="POST" id="editform">
                <div id="editContent">
                    <?php $this->getTabContent(); ?>                    
                </div>
            </form>
        </div> 
    </div>
</div>
