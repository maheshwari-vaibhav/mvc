<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Customer extends \Controller\Core\Admin {

	protected $customers = [];
	public function __construct()
	{
		Parent::__construct();
	}

	public function formAction()
	{
		try {

			$customer = \Mage::getModel('Customer');
			if ($id = $this->getRequest()->getGet('id')) {
				$customer = $customer->load($id);
				if (!$customer) {
					throw new \Exception("No record Found");
				}
			}
			$edit = \Mage::getBlock('Admin\Customer\Edit')->setTableRow($customer)->toHtml();
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
			$customer = \Mage::getModel('Customer');
			$shipping = \Mage::getModel('Customer\Address');
			$biling = \Mage::getModel('Customer\Address');
			if ($this->getRequest()->getGet('tab')=='information') {
				$customer = \Mage::getModel('Customer');

				if ($id = $this->getRequest()->getGet('id')) {
					$customer = $customer->load($id);
					if (!$customer) {
						throw new \Exception("Invalid Customer Id");
					}
					$customer->updatedDate = date("Y-m-d H:i:s");
					$this->getMessage()->setSuccess('Record updated successfully!!!');
				} 
				else
				{
					$customer->createdDate = date("Y-m-d H:i:s");
					$this->getMessage()->setSuccess('Record inserted successfully!!!');
				}
				$customerData = $this->getRequest()->getPost('customer');
				$customer->setData($customerData);
				$customer->password = md5($customer->password);
				if ($customer->save()) {
					if (!$id = $this->getRequest()->getGet('id')) {
						$shipping->customerId = $customer->customerId;
						$shipping->addressType = 2;
						$biling->customerId = $customer->customerId;
						$biling->addressType = 1;
						if ($biling->save()) {
						if (!$shipping->save()) {
							echo "Record not inserted";
						}
					}
				}

				}
				else
				{
					echo "Record not inserted";
				}
			}
			else 
			{
				if ($id = $this->getRequest()->getGet('id')) {
					$sqlShipping = "select * from `customer_address` where `customerId` ={$id} and `addressType` = 2";
					$shipping = $shipping->fetchRow($sqlShipping);
					if (!$shipping) {
						$shipping = \Mage::getModel('Customer\Address');
					}

					$sqlBiling = "select * from `customer_address` where `customerId` ={$id} and `addressType` = 1";
					$biling = $biling->fetchRow($sqlBiling);
					if (!$biling) {
						$biling = \Mage::getModel('Customer\Address');
					}
					$this->getMessage()->setSuccess('Record updated successfully!!!');
				} 

				$shippingData = $this->getRequest()->getPost('shipping');
				$shipping->setData($shippingData);
				$shipping->addressType = 2;
				$shipping->customerId = $this->getRequest()->getGet('id');

				$bilingData = $this->getRequest()->getPost('biling');
				$biling->setData($bilingData);
				$biling->addressType = 1;
				$biling->customerId = $this->getRequest()->getGet('id');

				
				if ($biling->save()) {
					if (!$shipping->save()) {
						echo "Record not inserted";
					}
				}
			}

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
			
		}
		$grid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();

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
			$customerId = (int) $this->getRequest()->getGet('id');
			if (!$customerId) {
				throw new \Exception("Invalid customer id.");
			}
			$customer = \Mage::getModel('Customer');
			$customer->load($customerId);
			if ($customer->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();

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
				$grid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();
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