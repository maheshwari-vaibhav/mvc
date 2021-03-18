<?php 
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');
class Media extends \Model\Core\Table
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTableName('product_media');
		$this->setPrimaryKey('mediaId');
	}
	
}
?>