<?php 
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');
class Index extends \Controller\Core\Customer {

	public function __construct()
	{
		Parent::__construct();
	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getContent();
		$content->addChild(\Mage::getBlock('Home\Slider'),'Slider')->addChild(\Mage::getBlock('Home\Index'),'Index');
		$this->renderLayout();
	}

}

?>