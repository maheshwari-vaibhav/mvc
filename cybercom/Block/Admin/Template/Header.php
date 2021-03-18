<?php 
/**
 * 
 */
\Mage::loadFileBYClassName('Block\Core\Template');
class Block_Template_Header extends \Block\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate('./View/admin/template/header.php');
	}

	
}
?>