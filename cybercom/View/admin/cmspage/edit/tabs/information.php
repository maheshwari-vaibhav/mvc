<?php 

$cmspage =  $this->getTableRow(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="POST" id="cmspageform">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="Enter title" id="title" name="cmspage[title]" value="<?=$cmspage->title;?>">
                </div>
                <div class="form-group">
                    <label for="identifier">Identifier:</label>
                    <input type="text" class="form-control" placeholder="Enter identifier" id="identifier" name="cmspage[identifier]" value="<?=$cmspage->identifier;?>">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="cmspage[content]" id="content" onfocus="$('#content').summernote();" class="form-control"><?=$cmspage->content;?></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="cmspage[status]" id="status">
                        <option value="" disabled>Select</option>
                        <?php foreach ($cmspage->getStatusOptions() as $key => $value): ?>

                        <option value="<?= $key ?>" <?php if ($key == $cmspage->status){ ?> selected <?php } ?> ><?= $value ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
                    <?= $this->getTableRow()->pageId ? 'Update' : 'Save';?>
                </button>   
               
            </form>
        </div> 
    </div>
</div>

