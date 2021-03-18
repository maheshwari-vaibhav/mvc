<?php 
$category = $this->getTableRow(); 

$parentCategories = $this->getParentCategories();

?>
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="category[name]" value="<?=$category->name;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" name="category[description]" id="description"><?=$category->description;?></textarea>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="category[status]" id="status">
        <option value="" disabled>Select</option>
        <?php foreach ($category->getStatusOptions() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $category->status){ ?> selected <?php } ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="parentId">Parent Category:</label>
    <select class="form-control" name="category[parentId]" id="parentId">
        <option value="">Select</option>
        <?php foreach ($parentCategories as $key => $value): ?>

        <option value="<?= $value->categoryId ?>" <?php if ($value->categoryId == $category->parentId){ ?> selected <?php } ?> ><?= $value->name ?></option>

        <?php endforeach ?>
    </select>
</div>
<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->categoryId ? 'Update' : 'Save';?>
</button>  