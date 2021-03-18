<?php 
namespace Block\Product;
\Mage::loadFileBYClassName('Block\Core\Template');
class Details extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/product/details.php');
	}

	
}
?>