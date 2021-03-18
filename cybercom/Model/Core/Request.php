<?php
namespace Model\Core;
class Request
{
	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			return false;
		}
		return true;
	}
	public function getPost($key = NULL, $optinal = NULL)
	{
		if(!$key) {
			return $_POST;
		}
		if(!array_key_exists($key, $_POST)) {
			return $optinal;
		}
		return $_POST[$key];
	}
	public function getGet($key = NULL, $optinal = NULL)
	{
		if(!$key) {
			return $_GET;
		}
		if(!array_key_exists($key, $_GET)) {
			return $optinal;
		}
		return $_GET[$key];
	}
	public function getControllerName()
	{
		return $this->getGet('c','index');
	}
	public function getActionName()
	{
		return $this->getGet('a','index');
	}
}

?>
