<?php 
namespace Block\Admin\Category\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Category Information','block'=>'Admin\Category\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>