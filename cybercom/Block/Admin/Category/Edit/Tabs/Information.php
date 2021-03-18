<?php 
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Information extends \Block\Core\Template
{
	protected $categories = [];
	protected $displayCategories = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/category/edit/tabs/information.php');
	}

	public function setCategories($categories = null)
	{
		if (!$categories) {
			$category = $this->getTableRow();
			$categories = $category->fetchAll();
		}
		$this->categories = $categories;
		return $this;
	}

	public function addDisplayName($category)
	{
		$this->displayCategories[] = $category;
		return $this;
	}

	public function getDisplayName()
	{
		return $this->displayCategories;
	}

	public function getCategories($sql = null)
	{
		if (!$sql) {
			$sql = "select * from {$this->getTableRow()->getTableName()} order by path";
		}
		$category = $this->getTableRow();
		return $category->fetchAll($sql)->getData();
	}

	public function getParentCategories()
	{
		$key = $this->getTableRow()->getPrimarykey();
		$id = $this->getTableRow()->$key;
		if (!$id) {
			$this->getNames();
			return $this->getDisplayName();
		}

		$sql = "select * from {$this->getTableRow()->getTableName()} where path not LIKE '{$id}/%' and path not LIKE '{$id}' and  path not LIKE '%/{$id}/%' and categoryId != {$id} and path not LIKE '%/{$id}' order by path";
		$this->getNames($sql);
		return $this->getDisplayName();
	}

	public function getNames($sql = null)
	{
		$this->displayCategories = [];
		foreach ($this->getCategories($sql) as $key => $category) {
			$path = explode("/",$category->path);
			$categoryName = '';
			foreach ($path as $key => $value) {
				foreach ($this->getCategories() as $key => $name) {
					if ($value == $name->categoryId) {
						if ($categoryName) {
							$categoryName.= '=>'.$name->name;
						}
						else
						{
							$categoryName = $name->name;
						}
					}
				}
			}
			$category->name = $categoryName;
			$this->addDisplayName($category);
		}
	}
}