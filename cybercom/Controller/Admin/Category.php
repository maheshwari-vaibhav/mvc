<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Category extends \Controller\Core\Admin {

	public function __construct() {
		Parent::__construct();
	}

	public function formAction() {
		try {

			$category = \Mage::getModel('Category');
			if ($id = $this->getRequest()->getGet('id')) {
				$category = $category->load($id);
				if (!$category) {
					throw new \Exception("No record Found");
				}
			}
			

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$edit = \Mage::getBlock('Admin\Category\Edit')->setTableRow($category)->toHtml();
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

	public function saveAction() {
		try {

			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request");
			}
			$category = \Mage::getModel('Category');
			if ($id = $this->getRequest()->getGet('id')) {
				$category = $category->load($id);
				if (!$category) {
					throw new \Exception("Invalid Category Id");
				}
				$this->getMessage()->setSuccess('Record updated successfully!!!');
			}
			else
			{
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$categoryData = $this->getRequest()->getPost('category');
			$category->setData($categoryData);

			if ($category->save()) {
				$category->setPath($category->categoryId);
			} else {
				echo "Record not inserted";
			}

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
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

	public function deleteAction() {
		try {
			$category = \Mage::getModel('Category');
			$categoryId = (int) $this->getRequest()->getGet('id');
			if (!$categoryId) {
				throw new \Exception("Invalid category id.");
			}
			$category->load($categoryId);
			$parentId = $category->parentId;
			
			if ($category->delete()) {
				$category->setParent($parentId,$categoryId);
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
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

	public function gridAction() {
		try {
			$grid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
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

}

?>