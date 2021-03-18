<?php 
namespace Block\Admin\CmsPage\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'CmsPage Information','block'=>'Admin\CmsPage\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>