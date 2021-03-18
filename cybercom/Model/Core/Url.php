<?php 
namespace Model\Core;
class Url
{
	
	protected $request = null;
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

	public function baseUrl($subUrl = null)
	{
		$url = "http://localhost/cybercom/";
		if ($subUrl) {
			$url .= $subUrl;
		}
		return $url;
	}
}
?>