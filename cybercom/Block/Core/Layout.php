<?php 
namespace Block\Core;

\Mage::loadFileBYClassName('Block\Core\Template');
class Layout extends Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/layout/one_column.php');
		$this->prepareChildren();
	}

	public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Core\Layout\Header'),'header');
		$this->addChild(\Mage::getBlock('Core\Layout\Left'),'left');
		$this->addChild(\Mage::getBlock('Core\Layout\Content'),'content');
		$this->addChild(\Mage::getBlock('Core\Layout\Right'),'right');
		$this->addChild(\Mage::getBlock('Core\Layout\Footer'),'footer');
	}

	
}
?>