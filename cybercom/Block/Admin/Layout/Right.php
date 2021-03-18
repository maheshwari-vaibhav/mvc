<?php 
namespace Block\Admin\Layout;
\Mage::loadFileBYClassName('Block\Core\Template');
class Right extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/layout/right.php');
	}

	
}
?>