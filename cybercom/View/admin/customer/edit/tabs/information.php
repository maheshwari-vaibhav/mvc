<?php 

$customer =  $this->getTableRow(); 
$customerGroups = $this->getCustomerGroups()->getData();

?>

<div class="form-group">
    <label for="groupId">Customer Group:</label>
    <select class="form-control" name="customer[groupId]" id="groupId">
        <option value="" disabled>Select</option>
        <?php foreach ($customerGroups as $key => $value): ?>
            print_r($customerGroups);
                <option value="<?= $value->groupId ?>" <?php if ($value->groupId == $customer->groupId){ ?> selected <?php } ?> ><?= $value->name ?></option>

        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" class="form-control" placeholder="Enter first name" id="firstName" name="customer[firstName]" value="<?=$customer->firstName?>">
</div>
<div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" class="form-control" placeholder="Enter last name" id="lastName" name="customer[lastName]" value="<?=$customer->lastName?>">
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" placeholder="Enter email" id="email" name="customer[email]" value="<?=$customer->email?>">
</div>
<div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="text" class="form-control" placeholder="Enter mobile" id="mobile" name="customer[mobile]" value="<?=$customer->mobile?>">
</div>
<div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="customer[password]">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="customer[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($customer->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $customer->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>

<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->customerId ? 'Update' : 'Save';?>
</button>      