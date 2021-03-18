<?php 
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $customer = null;
	protected $customers = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/grid.php');
	}

	public function setCustomer($customer = null)
	{
		if (!$customer) {
			$customer = \Mage::getModel('Customer');
		}
		$this->customer = $customer;
		return $this;
	}

	public function getCustomer()
	{
		if (!$this->customer) {
			$this->setCustomer();
		}
		return $this->customer;
	}

	public function getCustomers()
	{
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers;
	}

	public function setCustomers($customers = null)
	{
		if (!$customers) {
			$customer = $this->getCustomer();
			$sql = "select c.*,cg.name as 'groupname',ca.zipcode from `customer` c INNER join customer_group cg on cg.groupId = c.groupId INNER join customer_address ca on ca.customerId = c.customerId where ca.addressType = 1";
			$customers = $customer->fetchAll($sql);
		}
		$this->customers = $customers;
		return $this;
	}

}
?>