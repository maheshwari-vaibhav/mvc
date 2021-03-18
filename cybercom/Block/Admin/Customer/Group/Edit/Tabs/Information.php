<?php 
namespace Block\Admin\Customer\Group\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{
	
	protected $customerGroup = null;

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/group/edit/tabs/information.php');
	}

	public function setCustomerGroup(\Model\Customer\Group $customerGroup)
	{
		$this->customerGroup = $customerGroup;
		return $this;
	}

	public function getCustomerGroup()
	{
		return $this->customerGroup;
	}

}
?>