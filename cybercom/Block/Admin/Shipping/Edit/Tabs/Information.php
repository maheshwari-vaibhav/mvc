<?php 
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/edit/tabs/information.php');
	}

}