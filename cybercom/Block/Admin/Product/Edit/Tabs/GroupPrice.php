<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class GroupPrice extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/group_price.php');
	}

	public function getProductGroupPrices()
	{
		$key = $this->getTableRow()->getPrimaryKey();
		$productGroupPrice = \Mage::getModel('Product\GroupPrice');
		$sql = "SELECT cg.groupId,cg.name,cgp.entityId,cgp.groupPrice,p.price 
		from customer_group cg 
		left join customer_group_price cgp 
			on cgp.customerGroupId = cg.groupId
				and cgp.productId = '{$this->getTableRow()->$key}' 
		LEFT join product p 
			on p.productId = '{$this->getTableRow()->$key}'";
		return $productGroupPrice->fetchAll($sql);
	}

}