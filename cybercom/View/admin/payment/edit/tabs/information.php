<?php 

$payment =  $this->getTableRow(); ?>

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="payment[name]" value="<?=$payment->name;?>">
</div>
<div class="form-group">
    <label for="code">Code:</label>
    <input type="text" class="form-control" placeholder="Enter code" id="code" name="payment[code]" value="<?=$payment->code;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" name="payment[description]" id="description">
        <?=$payment->description;?>
    </textarea>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="payment[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($payment->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $payment->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>
<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->methodId ? 'Update' : 'Save';?>
</button>  