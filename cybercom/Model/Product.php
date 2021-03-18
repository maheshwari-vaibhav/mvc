<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Product extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('product');
		$this->setPrimaryKey('productId');
	}
	public function getStatusOptions()
	{
		return [
			self::STATUS_ENABLED => 'Enabled',
			self::STATUS_DISABLED => 'Disabled'
		];
	}

	public function getImages()
	{
		$media = \Mage::getModel('Product\Media');
		$key = $this->getPrimaryKey();
		$sql = "select * from {$media->getTableName()} where {$key} = {$this->$key}";
		return $media->fetchAll($sql);
	}
}
?>