<?php 

class Mage {
	
	public static function init()
	{
		self::getController('Core\front');
		Controller\Core\front::init();
	}

	public static function getController($className)
	{
		$className = self::prepareClassName('Controller',$className);
		self::loadFileByClassName($className);
		return new $className();
	}

	public static function loadFileByClassName($className)
	{
		$className = str_replace('\\', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '\\', $className);
		$className = $className.'.php';
		require_once $className;
	}

	public static function getModel($className)
	{
		$className = self::prepareClassName('Model',$className);
		self::loadFileByClassName($className);
		return new $className();
	}

	public static function getBlock($className)
	{
		$className = self::prepareClassName('Block',$className);
		self::loadFileByClassName($className);
		return new $className();
	}

	public static function prepareClassName($key, $namespace)
	{
		$className = $key.'_'.$namespace;
		$className = str_replace('_', ' ', $className);
		$className = str_replace('\\', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '\\', $className);
		return $className;
	}

	public static function getBaseDir($subPath = null)
	{
		if ($subPath) {
			return getcwd().DIRECTORY_SEPARATOR.$subPath.DIRECTORY_SEPARATOR;
		}
		return getcwd().DIRECTORY_SEPARATOR;
	}

	
}
Mage::init();


?>