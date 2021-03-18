<?php 
namespace Block\Admin\Customer\Group\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
		$this->prepareTabs();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Customer Group Information','block'=>'Admin\Customer\Group\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>