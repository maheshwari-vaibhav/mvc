<?php 
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $product = null;
	protected $products = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/grid.php');
	}

	public function setProduct($product = null)
	{
		if (!$product) {
			$product = \Mage::getModel('Product');
		}
		$this->product = $product;
		return $this;
	}

	public function getProduct()
	{
		if (!$this->product) {
			$this->setProduct();
		}
		return $this->product;
	}

	public function getProducts()
	{
		if (!$this->products) {
			$this->setProducts();
		}
		return $this->products;
	}

	public function setProducts($products = null)
	{
		if (!$products) {
			$product = $this->getProduct();
			$products = $product->fetchAll();
		}
		$this->products = $products;
		return $this;
	}

}
?>