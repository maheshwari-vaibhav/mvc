<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Index extends \Controller\Core\Admin {

	

	public function __construct()
	{
		Parent::__construct();
	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$this->renderLayout();
	}

}

?>