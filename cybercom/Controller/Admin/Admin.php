<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Admin extends \Controller\Core\Admin {

	public function __construct()
	{
		Parent::__construct();
	}

	public function formAction()
	{
		try {

			$admin = \Mage::getModel('Admin');
			if ($id = $this->getRequest()->getGet('id')) {
				$admin = $admin->load($id);
				if (!$admin) {
					throw new \Exception("No record Found");
				}
			}
			$edit = \Mage::getBlock('Admin\Admin\Edit')->setTableRow($admin)->toHtml();
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
			$this->redirect('grid', null, null, true);
		}
	}
	public function saveAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request");
			}
			$admin = \Mage::getModel('Admin');
			if ($id = $this->getRequest()->getGet('id')) {
				$admin = $admin->load($id);
				if (!$admin) {
					throw new \Exception("Invalid Admin Id");
				}
				$this->getMessage()->setSuccess('Record updated successfully!!!');
			} 
			else
			{
				$admin->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$adminData = $this->getRequest()->getPost('admin');
			$admin->setData($adminData);
			$admin->password = md5($admin->password);
			if (!$admin->save()) {
				throw new \Exception("Somthing went wrong");
				
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();

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
			$adminId = (int) $this->getRequest()->getGet('id');
			if (!$adminId) {
				throw new \Exception("Invalid admin id.");
			}
			$admin = \Mage::getModel('Admin');
			$admin->load($adminId);
			if ($admin->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();

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
				$grid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();

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
			$this->redirect('grid', null, null, true);
		}
		
	}

}

?>