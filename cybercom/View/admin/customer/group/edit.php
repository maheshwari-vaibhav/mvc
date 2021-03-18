<?php 

$customerGroup =  $this->getCustomerGroup(); ?>
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
                <?php if ($id = $this->getRequest()->getGet('id')): ?>
                    <button type="button" class="btn btn-primary" name="updatecustomergroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save',null,['id' => $id],true); ?>').setMethod('post').resetParms().setParams($('#customergroupform').serializeArray()).load();">UPDATE</button>      
                <?php else: ?>
                    <button type="button" class="btn btn-primary" name="addcustomergroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save',null,null,true); ?>').setMethod('post').resetParms().setParams($('#customergroupform').serializeArray()).load();">SAVE</button>
                <?php endif ?>
               
            </form>
        </div> 
    </div>
</div>
