<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Shipping extends \Controller\Core\Admin {

	public function __construct()
	{
		Parent::__construct();
	}

	public function formAction()
	{
		try {
			$shipping = \Mage::getModel('Shipping');
			if ($id = $this->getRequest()->getGet('id')) {
				$shipping = $shipping->load($id);
				if (!$shipping) {
					throw new \Exception("No record Found");
				}
			}

			$edit = \Mage::getBlock('Admin\Shipping\Edit')->setTableRow($shipping)->toHtml();
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
			$shipping = \Mage::getModel('Shipping');
			if ($id = $this->getRequest()->getGet('id')) {
				$shipping = $shipping->load($id);
				if (!$shipping) {
					throw new \Exception("Invalid Shipping Method Id");
				}
				$this->getMessage()->setSuccess('Record updated successfully!!!');
			} 
			else
			{
				$shipping->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$shippingData = $this->getRequest()->getPost('shipping');
			$shipping->setData($shippingData);

			if (!$shipping->save()) {
				throw new \Exception("Record not inserted");
				
			}

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();

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
			$methodId = (int) $this->getRequest()->getGet('id');
			if (!$methodId) {
				throw new \Exception("Invalid shipping method id.");
			}
			$shipping = \Mage::getModel('Shipping');
			$shipping->load($methodId);
			if ($shipping->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();

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
				$layout = $this->getLayout();
				$content = $layout->getContent();
				$grid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();
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