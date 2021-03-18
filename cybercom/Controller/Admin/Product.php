<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Product extends \Controller\Core\Admin {

	public function __construct()
	{
		Parent::__construct();
	}

	public function saveAction()
	{

		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request");
			}
			$product = \Mage::getModel('Product');
			if ($id = $this->getRequest()->getGet('id')) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("Invalid Product Id");
				}
				$product->updatedDate = date("Y-m-d H:i:s");

				$this->getMessage()->setSuccess('Record updated successfully!!!');
			} 
			else
			{
				$product->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}

			$productData = $this->getRequest()->getPost('product');
			foreach ($productData as &$key) {
				if (is_array($key)) {
					$key = implode(",",$key);
				}
			}
			$product->setData($productData);
			if (!$product->save()) {
				throw new \Exception("Record Not inserted");
			} 
			

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $grid
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}


	public function deleteAction()
	{
		try {
			$productId = (int) $this->getRequest()->getGet('id');
			if (!$productId) {
				throw new \Exception("Invalid product id.");
			}
			$product = \Mage::getModel('Product');
			$product->load($productId);
			if ($product->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');

			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $grid
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
		
	}

	public function gridAction()
	{
		try {
				$grid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'i am excellent',
					'elements'=> [
						[
							'selecter' => '#contentHtml',
							'html' => $grid
						]
					]
				];
				header("Content-type:application/json");
				echo json_encode($response);

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		
	}

	public function formAction()
	{
		try {

				$product = \Mage::getModel("Product");
				if ($id = $this->getRequest()->getGet('id')) {
					$product = $product->load($id);
					if (!$product) {
						throw new \Exception("No record Found");
					}
				}

				$edit = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'i am excellent',
					'elements'=> [
						[
							'selecter' => '#contentHtml',
							'html' => $edit
						]
					]
				];
				header("Content-type:application/json");
				echo json_encode($response);

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
			// $this->redirect('grid', null, null, true);
		}
		
	}

	public function groupPriceAction()
	{
		$groupData = $this->getRequest()->getPost('groupPrice');

		if (array_key_exists('exist', $groupData)) {
			foreach ($groupData['exist'] as $entityId => $price) {
				$groupPrice = \Mage::getModel('Product\GroupPrice');
				$groupPrice->load($entityId);
				$groupPrice->groupPrice = $price;
				$groupPrice->save();
			}
		}

		if (array_key_exists('new', $groupData)) {
			foreach ($groupData['new'] as $groupId => $price) {
				$groupPrice = \Mage::getModel('Product\GroupPrice');
				$groupPrice->productId = $this->getRequest()->getGet('id');
				$groupPrice->groupPrice = $price;
				$groupPrice->customerGroupId = $groupId;
				$groupPrice->save();
			}
		}


		$product = \Mage::getModel("Product");
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("No record Found");
			}
		}

		$edit = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $edit
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
		
	}

	public function productCategoryAction()
	{
		try {
			$categories = $this->getRequest()->getPost('categories');

			$productId = $this->getRequest()->getGet('id');
			$product = \Mage::getModel("Product");
			if ($productId) {
				$product = $product->load($productId);
				if (!$product) {
					throw new \Exception("No record Found");
				}
			}

			$productCategory = \Mage::getModel("Product\Category");

			$sql = "delete from {$productCategory->getTableName()} where productId = {$productId} and categoryId not in ( '" . implode( "', '" , $categories ) . "' )";
			$productCategory->delete($sql);
			
			$sql = "select categoryId,productId from {$productCategory->getTableName()} where productId = {$productId}";
			$productCategories = $productCategory->getAdapter()->fetchPairs($sql);

			foreach ($categories as $category) {
				if (!array_key_exists($category, $productCategories)) {
					$productCategory = \Mage::getModel("Product\Category");
					$productCategory->productId = $productId;
					$productCategory->categoryId = $category;
					$productCategory->save();
				}
			}


		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}

		$edit = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $edit
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}

	
}


?>