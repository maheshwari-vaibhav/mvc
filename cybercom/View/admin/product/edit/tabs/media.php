
<?php 
$images =  $this->getTableRow()->getImages(); 
	
?>
<div class="container">

	<div class="row">
		<div class="col">
			<button type="button" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('updatemedia','admin_product_media'); ?>').resetParms().setParams($('#editform').serializeArray()).setMethod('post').load()" class="btn btn-primary">Update</button>
			<button type="button" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('deletemedia','admin_product_media'); ?>').resetParms().setParams($('#editform').serializeArray()).setMethod('post').load()" class="btn btn-primary">Remove</button>

		</div>
	</div>
	<div class="row mt-2">
		<div class="col">
			<table class="table">

				<thead>
					<tr>
						<th>Image</th>
						<th>Label</th>
						<th>Small</th>
						<th>Thumb</th>
						<th>Base</th>
						<th>Gallary</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody>
						<?php if ($images->count()): ?>
		                        <?php foreach ($images->getData() as $image): ?>
									<tr>
										<td>
											<img style="width: 100px; height: 100px" src="<?php echo $this->baseUrl('uploads/').$image->path ?>"></td>
										<td>
											<input type="text" value="<?=$image->label?>" name="label[<?=$image->mediaId?>]"></td>
										<td>
											<input type="radio" <?php if ($image->small) {
											echo "checked";
										} ?> name="small[]" value="<?=$image->mediaId?>"></td>
										<td>
											<input type="radio" <?php if ($image->thumb) {
											echo "checked";
										} ?> name="thumb[]" value="<?=$image->mediaId?>"></td>
										<td>
											<input type="radio" <?php if ($image->base) {
											echo "checked";
										} ?> name="base[]" value="<?=$image->mediaId?>"></td>
										<td>
											<input type="checkbox" <?php if ($image->gallary) {
											echo "checked";
										} ?> name="gallary[<?=$image->mediaId?>]" ></td>
										<td>
											<input type="checkbox" name="remove[<?=$image->mediaId?>]"></td>
									</tr>
								<?php endforeach ?>
							
						<?php else: ?>
	                    	<tr>
	                    		<td colspan="7" align="center">Data not found</td>
	                    	</tr>
	                    <?php endif ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col">
			<form id="uploadmedia" class="form-inline">
				<div class="container">
				    <div class="input-group">
				      <div class="custom-file mr-4">
				        <input type="file" class="custom-file-input" id="productMedia" aria-describedby="productMedia">
				        <label class="custom-file-label" for="productMedia">Select file</label>
				      </div>
				      <div class="input-group-append">
				        <button class="btn btn-primary" type="button" id="customFileInput" onclick="var form = new FormData(); var files = $('#productMedia')[0].files; form.append('file',files[0]); object.setUrl('<?php echo $this->getUrl()->getUrl('uploadmedia','admin_product_media'); ?>').resetParms().setParams(form).setMethod('post').upload()">Upload</button>
				      </div>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
      var name = document.getElementById("productMedia").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = name
    })
 </script>