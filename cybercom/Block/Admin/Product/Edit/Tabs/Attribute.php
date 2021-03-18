<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Attribute extends \Block\Core\Template
{
	protected $attribute = null;

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/attribute.php');
	}

	public function setAttribute(\Model\Attribute $attribute = null)
	{
		if (!$attribute) {
			$attribute = \Mage::getModel('Attribute');		
		}
		$this->attribute = $attribute;
		return $this;
	}

	public function getAttribute()
	{
		if (!$this->attribute) {
			$this->setAttribute();
		}
		return $this->attribute; 
	}

	public function getAttributes()
	{
		$sql = "select * from {$this->getAttribute()->getTableName()} where entityTypeId = 'product'";
		return $this->getAttribute()->fetchAll($sql);
	}
}