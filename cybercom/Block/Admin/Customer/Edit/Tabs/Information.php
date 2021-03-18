<?php 
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs/information.php');
	}

	public function getCustomerGroups()
	{
		$customerGroup = \Mage::getModel('Customer\Group');
		return $customerGroup->fetchAll();
	}
}