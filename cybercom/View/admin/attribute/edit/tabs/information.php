<?php $attribute =  $this->getTableRow(); ?>

<div class="form-group">
    <label for="entityTypeId">Entity Type:</label>
    <select class="form-control" name="attribute[entityTypeId]" id="entityTypeId">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getEntityTypes() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $attribute->entityTypeId): ?> selected <?php endif; ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="attribute[name]" value="<?=$attribute->name;?>">
</div>

<div class="form-group">
    <label for="code">Code:</label>
    <input type="text" class="form-control" placeholder="Enter code" id="code" name="attribute[code]" value="<?=$attribute->code;?>">
</div>


<div class="form-group">
    <label for="inputType">Input Type:</label>
    <select class="form-control" name="attribute[inputType]" id="inputType">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getInputTypes() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $attribute->inputType): ?> selected <?php endif; ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="backendType">Backend Type:</label>
    <select class="form-control" name="attribute[backendType]" id="backendType">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getBackendTypes() as $key => $value): ?>

        <option value="<?= $key ?>" <?php if ($key == $attribute->backendType): ?> selected <?php endif; ?> ><?= $value ?></option>

        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="sortOrder">Sort Order:</label>
    <input type="number" min="1" class="form-control" placeholder="Enter sort order" id="sortOrder" name="attribute[sortOrder]" value="<?=$attribute->sortOrder;?>">
</div>

<?php if (!$this->getTableRow()->attributeId): ?>
     <button type="button" class="btn btn-primary" name="addattribute" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">SAVE</button>  
<?php endif ?> 