<?php 
namespace Block\Admin\Product\Edit;

\Mage::loadFileBYClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		
		$this->addTab('information',['label'=>'Product Information','block'=>'Admin\Product\Edit\Tabs\Information']);

		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('media',['label'=>'Product Media','block'=>'Admin\Product\Edit\Tabs\Media']);
			$this->addTab('category',['label'=>'Product Category','block'=>'Admin\Product\Edit\Tabs\Category']);
			$this->addTab('groupprice',['label'=>'Group Price','block'=>'Admin\Product\Edit\Tabs\GroupPrice']);
			$this->addTab('attribute',['label'=>'Attribute','block'=>'Admin\Product\Edit\Tabs\Attribute']);
		}
		

		$this->setDefaultTab('information');
	}
	
}
?>