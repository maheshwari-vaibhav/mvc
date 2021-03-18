<?php 
namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');
class Group extends \Model\Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('customer_group')->setPrimaryKey('groupId');
	}

	public function getStatusOptions()
	{
		return [
			self::STATUS_DISABLED => 'Disabled',
			self::STATUS_ENABLED => 'Enabled'
		];
	}
}