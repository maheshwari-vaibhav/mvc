<?php 
namespace Block\Core;

class Template
{
	protected $template = null;
	protected $children = [];
	protected $url = null;
	protected $request = null;
	protected $tableRow = null;

	function __construct()
	{
		$this->setUrl();
		$this->setRequest();
	}

	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	public function toHtml()
	{
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function setUrl($url = null)
	{
		if (!$url) {
			$url = \Mage::getModel('Core\Url');
		}
		$this->url = $url;
		return $this;
	}

	public function getUrl()
	{
		return $this->url;
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
	
	public function setChildren(array $children = [])
	{
		$this->children = $children;
		return $this;
	}

	public function getChildren()
	{
		return $this->children;
	}

	public function addChild(\Block\Core\Template $child, $key = null)
	{
		if (!$key) {
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key)
	{
		if (!array_key_exists($key, $this->children)) {
			return null;
		}
		return $this->children[$key];
	}

	public function removeChild($key)
	{
		if (array_key_exists($key, $this->children)) {
			unset($this->children[$key]);
		}
		return $this;
	}

	public function getContent()
	{
		return $this->getChild('content');
	}

	public function getLeft()
	{
		return $this->getChild('left');
	}

	public function getRight()
	{
		return $this->getChild('left');
	}

	public function createBlock($className)
	{
		return \Mage::getBlock($className);
	}

	public function redirect($actionName = NULL, $controllerName = NULL, $params = [], $resetparams = false) {
		header("Location:{$this->getUrl()->getUrl($actionName,$controllerName,$params,$resetparams)}");
	}

	public function getMessage()
	{
		return \Mage::getModel('Admin\Message');
	}

	public function baseUrl($subUrl = null)
	{
		return $this->getUrl()->baseUrl($subUrl);
	}

	public function setTableRow(\Model\Core\Table $tableRow)
	{
		$this->tableRow = $tableRow;
		return $this;
	}

	public function getTableRow()
	{
		return $this->tableRow;
	}
}
?>