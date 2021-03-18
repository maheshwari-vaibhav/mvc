<?php 
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $attribute = null;
	protected $attributes = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/attribute/grid.php');
	}

	public function setAttribute($attribute = null)
	{
		if (!$attribute) {
			$attribute = \Mage::getModel('Attribute');
		}
		$this->attribute = $attribute;
		return $this;
	}

	public function getAttribute()
	{
		if (!$this->attribute) {
			$this->setAttribute();
		}
		return $this->attribute;
	}

	public function getAttributes()
	{
		if (!$this->attributes) {
			$this->setAttributes();
		}
		return $this->attributes;
	}

	public function setAttributes($attributes = null)
	{
		if (!$attributes) {
			$attribute = $this->getAttribute();
			$attributes = $attribute->fetchAll();
		}
		$this->attributes = $attributes;
		return $this;
	}

}
?>