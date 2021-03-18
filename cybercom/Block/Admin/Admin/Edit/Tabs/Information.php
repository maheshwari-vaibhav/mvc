<?php 
namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/admin/edit/tabs/information.php');
	}
	
}