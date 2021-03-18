<?php 
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $category = null;
	protected $categories = [];
	protected $displayCategories = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/category/grid.php');
		$this->getNames();
	}

	public function setCategory($category = null)
	{
		if (!$category) {
			$category = \Mage::getModel('Category');
		}
		$this->category = $category;
		return $this;
	}

	public function getCategory()
	{
		if (!$this->category) {
			$this->setCategory();
		}
		return $this->category;
	}
	
	public function setCategories($categories = null)
	{
		if (!$categories) {
			$category = $this->getCategory();
			$categories = $category->fetchAll();
		}
		$this->categories = $categories;
		return $this;
	}


	public function getCategories()
	{
		$category = $this->getCategory();
		$sql = "select * from category order by path";
		return $category->fetchAll($sql)->getData();
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

	public function getNames()
	{
		foreach ($this->getCategories() as $key => $category) {
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
?>