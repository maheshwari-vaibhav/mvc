<?php 
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Product\Edit\Tabs'));
	}

}
?>