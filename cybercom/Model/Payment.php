<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Payment extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('payment');
		$this->setPrimaryKey('methodId');
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