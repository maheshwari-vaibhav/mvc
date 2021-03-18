<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Group extends \Controller\Core\Admin
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			
			$grid = \Mage::getBlock('Admin\Customer\Group\grid')->toHtml();
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

	public function formAction()
	{
		try {
			$customerGroup = \Mage::getModel('Customer\Group');
			if ($id = $this->getRequest()->getGet('id')) {
				$customerGroup = $customerGroup->load($id);
				if (!$customerGroup) {
					throw new \Exception("No record Found");
				}
			}
			$edit = \Mage::getBlock('Admin\Customer\Group\Edit')->setTableRow($customerGroup)->toHtml();
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
			if (!$this->getRequest()->getPost()) {
				throw new \Exception("Invalid Request", 1);
				
			}
			$customerGroup =  \Mage::getModel('Customer\Group');
			if ($id = $this->getRequest()->getGet('id')) {
				$customerGroup = $customerGroup->load($id);
				if (!$customerGroup) {
					throw new \Exception("Invalid Id", 1);
				}
				$this->getMessage()->setSuccess('Record Updated successfully!!!');
			}
			else
			{
				$customerGroup->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$groupData = $this->getRequest()->getPost('customerGroup');
			$customerGroup->setdata($groupData);
			if (!$customerGroup->save()) {
				$this->getMessage()->setFailure('Somthing went wrong !!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Customer\Group\grid')->toHtml();

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
		
			$customerGroup =  \Mage::getModel('Customer\Group');
			if ($id = $this->getRequest()->getGet('id')) {
				$customerGroup = $customerGroup->load($id);
				if (!$customerGroup) {
					throw new \Exception("Invalid Id", 1);
				}
			}
			if ($customerGroup->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			}
			else
			{
				$this->getMessage()->setFailure('Somthing went wrong !!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Customer\Group\grid')->toHtml();

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
}