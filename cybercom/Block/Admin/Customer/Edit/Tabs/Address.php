<?php 
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{

	protected $address = null;
	protected $shipping = null;
	protected $biling = null;	

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs/address.php');
	}

	public function setShipping($shipping =  null)
	{
		if (!$shipping) {
			$shipping = \Mage::getModel('Customer\Address');
			$key = $this->getTableRow()->getPrimaryKey();
			if ($id = $this->getTableRow()->$key) {
				$sql = "select * from `{$shipping->getTableName()}` where `{$key}` ={$id} and `addressType` = 2";
				$shipping = $shipping->fetchRow($sql);
				if (!$shipping) {
					$shipping = \Mage::getModel('Customer\Address');
				}
			}
		}
		$this->shipping = $shipping;
		return $this;
	}

	public function getShipping()
	{
		if (!$this->shipping) {
			$this->setShipping();
		}
		return $this->shipping;
	}

	public function setBiling($biling =  null)
	{
		if (!$biling) {
			$biling = \Mage::getModel('Customer\Address');
			$key = $this->getTableRow()->getPrimaryKey();
			if ($id = $this->getTableRow()->$key) {
				$sql = "select * from `{$biling->getTableName()}` where `{$key}` ={$id} and `addressType` = 1";
				$biling = $biling->fetchRow($sql);
				if (!$biling) {
					$biling = \Mage::getModel('Customer\Address');
				}
			}
		}
		$this->biling = $biling;
		return $this;
	}

	public function getBiling()
	{
		if (!$this->biling) {
			$this->setBiling();
		}
		return $this->biling;
	}
}