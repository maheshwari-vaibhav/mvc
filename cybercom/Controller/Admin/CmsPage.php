<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class CmsPage extends \Controller\Core\Admin
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			
			$grid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();
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

			$cmsPage = \Mage::getModel('CmsPage');
			if ($id = $this->getRequest()->getGet('id')) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("No record Found");
				}
			}
			$edit = \Mage::getBlock('Admin\CmsPage\Edit')->setTableRow($cmsPage)->toHtml();
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
			$cmsPage =  \Mage::getModel('CmsPage');
			if ($id = $this->getRequest()->getGet('id')) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("Invalid Id", 1);
				}
				$this->getMessage()->setSuccess('Record Updated successfully!!!');
			}
			else
			{
				$cmsPage->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$cmsPageData = $this->getRequest()->getPost('cmspage');
			$cmsPage->setdata($cmsPageData);
			if (!$cmsPage->save()) {
				$this->getMessage()->setFailure('Somthing went wrong !!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();

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
		
			$cmsPage =  \Mage::getModel('CmsPage');
			if ($id = $this->getRequest()->getGet('id')) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("Invalid Id", 1);
				}
			}
			if ($cmsPage->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			}
			else
			{
				$this->getMessage()->setFailure('Somthing went wrong !!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();

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