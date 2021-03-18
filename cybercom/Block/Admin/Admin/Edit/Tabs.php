<?php 
namespace Block\Admin\Admin\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Admin Information','block'=>'Admin\Admin\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>