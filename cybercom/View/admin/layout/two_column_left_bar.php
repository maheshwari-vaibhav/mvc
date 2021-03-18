<table width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<?php echo $this->getChild('header')->toHtml(); ?>
			</td>
		</tr>
		<tr>
			<td width="20%">
				<?php echo $this->getChild('left')->toHtml(); ?>
			</td>
			<td>
				<?php echo $this->getChild('content')->toHtml(); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $this->getChild('footer')->toHtml(); ?>
			</td>
		</tr>
	</tbody>
</table>