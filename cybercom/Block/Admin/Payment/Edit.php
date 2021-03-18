<?php 
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Payment\Edit\Tabs'));
	}

}
?>