<?php 
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/attribute/edit/tabs/information.php');
	}

}