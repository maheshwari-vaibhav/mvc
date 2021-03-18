<?php $categories = $this->getCategoies()->getData(); ?>
<div class="form-group">
    <label for="status">Product Category:</label>
    <select class="form-control" name="categories[]" id="productCategory" multiple>
        <option value="" disabled>Select</option>
        <?php foreach ($categories as $categoryId => $category): ?>
        	
        <option value="<?= $category->categoryId ?>" <?php if (array_key_exists($category->categoryId, $this->productCategory())){ ?> selected <?php } ?> ><?= $this->getName($category) ?></option>

        <?php endforeach ?>
    </select>
</div>
<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('productCategory'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
	Update
</button> 