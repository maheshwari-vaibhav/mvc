<?php 
/**
 * 
 */
\Mage::loadFileBYClassName('Block\Core\Template');
class Block_Template_Footer extends \Block\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate('./View/admin/template/footer.php');
	}

	
}
?>