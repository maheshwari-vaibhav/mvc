<?php 
$shipping = $this->getTableRow(); ?>

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="shipping[name]" value="<?=$shipping->name;?>">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" placeholder="Enter amount" id="amount" name="shipping[amount]" value="<?=$shipping->amount;?>">
</div>
<div class="form-group">
    <label for="code">Code:</label>
    <input type="text" class="form-control" placeholder="Enter code" id="code" name="shipping[code]" value="<?=$shipping->code;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" name="shipping[description]" id="description">
        <?=$shipping->description;?>
    </textarea>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="shipping[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($shipping->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $shipping->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>
<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->methodId ? 'Update' : 'Save';?>
</button>  