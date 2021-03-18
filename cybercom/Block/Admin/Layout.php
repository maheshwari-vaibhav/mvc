<?php 
namespace Block\Admin;

\Mage::loadFileBYClassName('Block\Core\Layout');
class Layout extends \Block\Core\Layout
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/layout/one_column.php');
	}

	public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Admin\Layout\Header'),'header');
		$this->addChild(\Mage::getBlock('Admin\Layout\Left'),'left');
		$this->addChild(\Mage::getBlock('Admin\Layout\Content'),'content');
		$this->addChild(\Mage::getBlock('Admin\Layout\Right'),'right');
		$this->addChild(\Mage::getBlock('Admin\Layout\Footer'),'footer');
	}
	
}
?>