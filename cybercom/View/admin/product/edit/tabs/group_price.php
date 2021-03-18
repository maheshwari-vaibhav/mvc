<?php $productGroupPrices = $this->getProductGroupPrices(); ?>
<button type="button" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('groupprice'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">Update</button>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<td>Group Name</td>
			<td>Product Price</td>
			<td>Group Price</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($productGroupPrices->getData() as $groupPrice): ?>
			<tr>
				<td><?= $groupPrice->name ?> </td>
				<td><?= $groupPrice->price ?> </td>
				<td><input type="text" name="groupPrice[<?php if(!$groupPrice->entityId): ?>new<?php else: ?>exist<?php endif; ?>][<?php if(!$groupPrice->entityId): ?><?= $groupPrice->groupId ?><?php else: ?><?= $groupPrice->entityId ?><?php endif; ?>]" value="<?= $groupPrice->groupPrice ?>"></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>