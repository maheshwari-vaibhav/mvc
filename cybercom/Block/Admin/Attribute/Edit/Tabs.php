<?php 
namespace Block\Admin\Attribute\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label'=>'Attribute Information','block'=>'Admin\Attribute\Edit\Tabs\Information']);
		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('option',['label'=>'Attribute Options','block'=>'Admin\Attribute\Edit\Tabs\Option']);
		}
		
		$this->setDefaultTab('information');
	}
	
}
?>