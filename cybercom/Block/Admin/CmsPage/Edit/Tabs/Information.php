<?php 
namespace Block\Admin\CmsPage\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/cmspage/edit/tabs/information.php');
	}

}