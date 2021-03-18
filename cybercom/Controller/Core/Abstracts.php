<?php 
namespace Controller\Core;

class Abstracts {
	protected $request = null;
	protected $layout = null;
	protected $message = null;

	function __construct()
	{
		$this->setRequest();
	}

	public function setRequest()
	{
		$this->request = \Mage::getModel('Core\Request');
		return $this;
	}

	public function getRequest()
	{
		return $this->request;
	}

	public function setLayout(\Block\Core\Layout $layout = null)
	{
		if (!$layout) {
			$layout = \Mage::getBlock('CoreLayout');
		}
		$this->layout = $layout;
		return $this;
	}

	public function getLayout()
	{
		if (!$this->layout) {
			$this->setLayout();
		}
		return $this->layout;
	}

	public function renderLayout()
	{
		echo $this->getLayout()->toHtml();
	}
	
	public function getUrl($actionName = null, $controllerName = null, $params = null , $resetParmas = false)
	{
		$final = $this->getRequest()->getGet();

		if ($resetParmas) {
			$final = [];
		}

		if (!$actionName) {
			$actionName = $this->getRequest()->getActionName();
		}

		if (!$controllerName) {
			$controllerName = $this->getRequest()->getControllerName();
		}

		$final['c'] = $controllerName;
		$final['a'] = $actionName;

		if (is_array($params)) {
			$final = array_merge($final,$params);
		}
		$queryString = http_build_query($final);

		return "http://localhost/cybercom/index.php?{$queryString}";
	}

	public function redirect($actionName = null, $controllerName = null, $params = null , $resetParmas = false)
	{
		header("location:{$this->getUrl($actionName, $controllerName,$params,$resetParmas)}");
	}

	public function setMessage($message = null)
	{
		if (!$message) {
			$message = \Mage::getModel('Admin\Message');
		}
		$this->message = $message;
		return $this;
	}

	public function getMessage()
	{
		if (!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}
}
?>