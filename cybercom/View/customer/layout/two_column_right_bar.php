<table border="1" width="100%">
	<tbody>
		<tr>
			<td colspan="2" height="100px">
				<?php echo $this->getChild('header')->toHtml(); ?>
			</td>
		</tr>
		<tr height="400px">
			<td>
				<?php echo $this->getChild('content')->toHtml(); ?>
			</td>
			<td width="20%">
				<?php echo $this->getChild('left')->toHtml(); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="100px">
				<?php echo $this->getChild('footer')->toHtml(); ?>
			</td>
		</tr>
	</tbody>
</table>