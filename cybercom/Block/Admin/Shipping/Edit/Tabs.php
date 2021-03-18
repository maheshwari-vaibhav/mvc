<?php 
namespace Block\Admin\Shipping\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Shipping Information','block'=>'Admin\Shipping\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>