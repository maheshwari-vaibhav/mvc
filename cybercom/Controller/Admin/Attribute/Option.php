<?php 
namespace Controller\Admin\Attribute;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Option extends \Controller\Core\Admin {

	

	public function __construct()
	{
		Parent::__construct();
	}

	public function saveAction()
	{
		try {
			
			$optionData = $this->getRequest()->getPost();


			if (array_key_exists('new', $optionData)) {
				foreach ($optionData['new']['name'] as $key => $name) {
					$attributeOption = \Mage::getModel('Attribute\Option');
					$attributeOption->name = $name;
					$attributeOption->sortOrder = $optionData['new']['sortOrder'][$key];
					$attributeOption->attributeId = $this->getRequest()->getGet('id');
					$attributeOption->save();
				}
			}

			if (array_key_exists('exist', $optionData)) {
				foreach ($optionData['exist'] as $optionId => $option) {
					$attributeOption = \Mage::getModel('Attribute\Option');
					$attributeOption->load($optionId);
					$attributeOption->name = $option['name'];
					$attributeOption->sortOrder = $option['sortOrder'];
					$attributeOption->save();
				}
			}

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
			// $this->redirect('grid', null, null, true);
		}
		$attribute = \Mage::getModel('Attribute');
		if ($id = $this->getRequest()->getGet('id')) {
			$attribute = $attribute->load($id);
			if (!$attribute) {
				throw new \Exception("No record Found");
			}
		}

		$form = \Mage::getBlock('Admin\Attribute\Edit\Tabs\Option')->setTableRow($attribute)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements' => [
				[
					'selecter' => '#editContent',
					'html' => $form
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}

	public function deleteAction()
	{
		try {
			$attributeOptionId = (int) $this->getRequest()->getGet('optionid');
			if (!$attributeOptionId) {
				throw new \Exception("Invalid attribute method id.");
			}
			$attributeOption =  \Mage::getModel('Attribute\Option');
			
			$attributeOption->load($attributeOptionId);
			if ($attributeOption->delete()) {
				$this->getMessage()->setSuccess('Record deleted successfully!!!');
				// $this->redirect('grid',null,null,true);
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
				// $this->redirect('grid',null,null,true);
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
			// $this->redirect('grid', null, null, true);
		}
		$form = \Mage::getBlock('Admin\Attribute\Edit\Tabs\Option')->setTableRow($attribute)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements' => [
				[
					'selecter' => '#editContent',
					'html' => $form
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}


}

?>