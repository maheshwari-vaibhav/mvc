<?php 
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');
class Category extends \Model\Core\Table
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTableName('product_category');
		$this->setPrimaryKey('entityId');
	}
	
}
?>