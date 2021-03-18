<?php 
namespace Block\Admin\Customer\Group;
\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Customer\Group\Edit\Tabs'));
	}

}
?>