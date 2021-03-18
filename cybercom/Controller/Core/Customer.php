<?php 
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
class Customer extends Abstracts {

	public function setLayout(\Block\Core\Layout $layout = null)
	{
		if (!$layout) {
			$layout = \Mage::getBlock('Customer\Layout');
		}
		$this->layout = $layout;
		return $this;
	}

	public function setMessage($message = null)
	{
		if (!$message) {
			$message = \Mage::getModel('Customer\Message');
		}
		$this->message = $message;
		return $this;
	}

}
?>