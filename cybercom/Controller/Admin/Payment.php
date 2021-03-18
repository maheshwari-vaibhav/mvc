<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Payment extends \Controller\Core\Admin {
	
	protected $payments = [];

	public function __construct()
	{
		Parent::__construct();
	}

	public function formAction()
	{
		try {

			$payment = \Mage::getModel('Payment');
			if ($id = $this->getRequest()->getGet('id')) {
				$payment = $payment->load($id);
				if (!$payment) {
					throw new \Exception("No record Found");
				}
			}

			$edit = \Mage::getBlock('Admin\Payment\Edit')->setTableRow($payment)->toHtml();
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
			$payment = \Mage::getModel('Payment');
			if ($id = $this->getRequest()->getGet('id')) {
				$payment = $payment->load($id);
				if (!$payment) {
					throw new \Exception("Invalid Payment Method Id");
				}
				$this->getMessage()->setSuccess('Record updated successfully!!!');
			} 
			else
			{
				$payment->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$paymentData = $this->getRequest()->getPost('payment');
			$payment->setData($paymentData);

			if ($payment->save()) {
			} else {
				echo "Record not inserted";
			}
			

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();

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
				throw new \Exception("Invalid payment method id.");
			}
			$payment =  \Mage::getModel('Payment');
			$payment->load($methodId);
			if ($payment->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();

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
				$grid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();
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