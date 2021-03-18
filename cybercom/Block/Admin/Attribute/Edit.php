<?php 
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Attribute\Edit\Tabs'));
	}

}
?>