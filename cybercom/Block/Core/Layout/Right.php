<?php 
namespace Block\Core\Layout;
\Mage::loadFileBYClassName('Block\Core\Template');
class Right extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/layout/right.php');
	}

	
}
?>