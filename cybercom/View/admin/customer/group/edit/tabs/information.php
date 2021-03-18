<?php 

$customerGroup =  $this->getTableRow(); ?>
<div class="container mt-3">
    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="POST" id="customergroupform">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter name" id="name" name="customerGroup[name]" value="<?=$customerGroup->name;?>">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="customerGroup[status]" id="status">
                        <option value="" disabled>Select</option>
                        <?php foreach ($customerGroup->getStatusOptions() as $key => $value): ?>

                        <option value="<?= $key ?>" <?php if ($key == $customerGroup->status){ ?> selected <?php } ?> ><?= $value ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
                    <?= $this->getTableRow()->groupId ? 'Update' : 'Save';?>
                </button>   
               
            </form>
        </div> 
    </div>
</div>
