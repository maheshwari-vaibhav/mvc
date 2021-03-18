<?php 
namespace Block\Admin\Layout;

\Mage::loadFileBYClassName('Block\Core\Template');
class Footer extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/layout/footer.php');
	}

	
}
?>