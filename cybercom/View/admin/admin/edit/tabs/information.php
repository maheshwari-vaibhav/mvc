<?php 

$admin =  $this->getTableRow(); ?>

<div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" placeholder="Enter user name" id="username" name="admin[username]" value="<?=$admin->username?>">
</div>
<div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="admin[password]">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="admin[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($admin->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $admin->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>


<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->adminId ? 'Update' : 'Save';?>
</button>      
  