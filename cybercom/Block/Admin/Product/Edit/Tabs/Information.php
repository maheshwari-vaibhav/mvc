<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/information.php');
	}

}