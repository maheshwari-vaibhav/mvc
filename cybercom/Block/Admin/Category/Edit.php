<?php 
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Category\Edit\Tabs'));
	}

}
?>