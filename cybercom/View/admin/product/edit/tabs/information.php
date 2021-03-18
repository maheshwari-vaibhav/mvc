<?php $product = $this->getTableRow(); ?>
<div class="form-group">
    <label for="sku">SKU:</label>
    <input type="text" class="form-control" placeholder="Enter sku" id="sku" name="product[sku]" value="<?=$product->sku;?>">
</div>
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="product[name]" value="<?=$product->name;?>">
</div>
<div class="form-group">
    <label for="price">Price:</label>
    <input type="text" class="form-control" placeholder="Enter price" id="price" name="product[price]" value="<?=$product->price;?>">
</div>
<div class="form-group">
    <label for="discount">Discount:</label>
    <input type="text" class="form-control" placeholder="Enter discount" id="discount" name="product[discount]" value="<?=$product->discount;?>">
</div>
<div class="form-group">
    <label for="quantity">Quantity:</label>
    <input type="text" class="form-control" placeholder="Enter quantity" id="quantity" name="product[quantity]" value="<?=$product->quantity;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" name="product[description]" id="description">
        <?=$product->description;?>
    </textarea>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="product[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($product->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $product->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>
<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->productId ? 'Update' : 'Save';?>
</button>  
