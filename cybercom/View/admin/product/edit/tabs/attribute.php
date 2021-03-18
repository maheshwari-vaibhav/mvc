<?php $attributes = $this->getAttributes()->getData(); ?>
<?php $product = $this->getTableRow(); ?>
<?php foreach ($attributes as $attribute): ?>
	<?php if ($attribute->inputType == "text"): ?>
		<div class="form-group">
		    <label for="<?= $attribute->code ?>"><?= $attribute->name ?></label>
		    <input type="text" class="form-control" placeholder="Enter <?= $attribute->name ?>" id="<?= $attribute->code ?>" name="product[<?= $attribute->code ?>]" value="<?php $code = $attribute->code ; echo $product->$code;?>"/>
		</div>

	<?php elseif($attribute->inputType == "select"): ?>

		<div class="form-group">
		    <label for="<?= $attribute->code; ?>"><?= $attribute->name ?></label>
		    <select class="form-control" name="product[<?= $attribute->code ?>]">
			  	<option>select <?= $attribute->name ?></option>
			  	<?php foreach ($attribute->getOptions()->getData() as $option): ?>
			  		<option value="<?= $option->optionId ?>" <?php $code = $attribute->code;  if ($option->optionId == $product->$code){ ?> selected <?php } ?>><?= $option->name ?></option>
			  	<?php endforeach ?>
			</select>
		</div>

	<?php elseif($attribute->inputType == "multi"): ?>

		<div class="form-group">
		    <label for="<?= $attribute->code; ?>"><?= $attribute->name ?></label>
		    <select class="form-control" multiple name="product[<?= $attribute->code ?>][]">
			  	<option disabled>select <?= $attribute->name ?></option>
			  	<?php foreach ($attribute->getOptions()->getData() as $option): ?>
			  		<option value="<?= $option->optionId ?>" <?php $code = $attribute->code;  if (in_array($option->optionId, explode(',', $product->$code))){ ?> selected <?php } ?>><?= $option->name ?></option>
			  	<?php endforeach ?>

			</select>
		</div>

	<?php elseif($attribute->inputType == "radio"): ?>

		<div class="form-group">
		    <label class="d-block" for="<?= $attribute->code; ?>"><?= $attribute->name ?></label>
	  		<?php foreach ($attribute->getOptions()->getData() as $option): ?>
	  			<div class="form-check-inline">
				  	<label class="form-check-label">
				    	<input type="radio" name="product[<?= $attribute->code ?>]" value="<?= $option->optionId ?>"<?php $code = $attribute->code;  if ($option->optionId == $product->$code){ ?> checked <?php } ?> ><span class="ml-2"><?= $option->name ?></span>
				  	</label>
				</div>
	  		<?php endforeach ?>
		</div>

	<?php elseif($attribute->inputType == "checkbox"): ?>

		<div class="form-group">
		    <label class="d-block" for="<?= $attribute->code; ?>"><?= $attribute->name ?></label>
	  		<?php foreach ($attribute->getOptions()->getData() as $option): ?>
	  			<div class="form-check-inline">
				  	<label class="form-check-label">
				    	<input type="checkbox" name="product[<?= $attribute->code ?>][]" value="<?= $option->optionId ?>" <?php $code = $attribute->code;  if (in_array($option->optionId, explode(',', $product->$code))){ ?> checked <?php } ?> ><span class="ml-2"><?= $option->name ?></span>
				  	</label>
				</div>
	  		<?php endforeach ?>
		</div>
	<?php else : ?>
		<div class="form-group">
		  <label for="<?= $attribute->code ?>"><?= $attribute->name ?>:</label>
		  <textarea class="form-control" rows="5" id="<?= $attribute->code ?>" name="product[<?= $attribute->code ?>]"><?php $code = $attribute->code ; echo $product->code;?></textarea>
		</div>
	<?php endif ?>
<?php endforeach ?>

<button type="button" class="btn btn-primary" name="addattribute" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">SAVE</button>