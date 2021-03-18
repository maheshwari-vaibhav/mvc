<?php 
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');
class GroupPrice extends \Model\Core\Table
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTableName('customer_group_price');
		$this->setPrimaryKey('entityId');
	}
	
}
?>