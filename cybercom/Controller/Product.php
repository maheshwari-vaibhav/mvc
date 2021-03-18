<?php 
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');
class Product extends \Controller\Core\Customer {

	public function __construct()
	{
		Parent::__construct();
	}

	public function detailAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getContent();
		$content->addChild(\Mage::getBlock('Product\Details'),'Details');
		$this->renderLayout();
	}

}

?>