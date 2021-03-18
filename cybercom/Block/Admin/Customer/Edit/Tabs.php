<?php 
namespace Block\Admin\Customer\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Customer Information','block'=>'Admin\Customer\Edit\Tabs\Information']);
		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('address',['label'=>'Customer Address','block'=>'Admin\Customer\Edit\Tabs\Address']);
		}
		
		$this->setDefaultTab('information');
	}
	
}
?>