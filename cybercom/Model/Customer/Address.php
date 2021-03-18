<?php 
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Core\Table');
class Address extends \Model\Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('customer_address');
		$this->setPrimaryKey('addressId');
	}
	public function getStatusOptions()
	{
		return [
			self::STATUS_ENABLED => 'Enabled',
			self::STATUS_DISABLED => 'Disabled'
		];
	}
}
?>