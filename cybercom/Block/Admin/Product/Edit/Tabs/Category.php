<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Category extends \Block\Core\Template
{
	protected $categoryOptions = [];
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/category.php');
	}

	public function getCategoies()
	{
		$category = \Mage::getModel('Category');
		return $category->fetchAll();
	}

	public function getName($category)
	{
		$categoryModel = \Mage::getModel('Category');

		if (!$this->categoryOptions) {
			$sql = "select categoryId,name from {$categoryModel->getTableName()}";
			$this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($sql);
		}

		$pathIds = explode('/', $category->path);
		foreach ($pathIds as $key => &$id) {
			if (array_key_exists($id, $this->categoryOptions)) {
				$id = $this->categoryOptions[$id];
			}
		}
		$name = implode('\\', $pathIds);
		return $name;

	}

	public function productCategory()
	{
		$productCategory = \Mage::getModel("Product\Category");
		$sql = "select categoryId,productId from {$productCategory->getTableName()} where productId = {$this->getTableRow()->productId}";
		return $productCategory->getAdapter()->fetchPairs($sql);
	}

}