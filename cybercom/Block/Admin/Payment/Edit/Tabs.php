<?php 
namespace Block\Admin\Payment\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Payment Information','block'=>'Admin\Payment\Edit\Tabs\Information']);
		$this->setDefaultTab('information');
	}
	
}
?>