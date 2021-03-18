<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Attribute extends \Controller\Core\Admin {

	public function __construct()
	{
		Parent::__construct();
	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$this->renderLayout();
	}

	public function gridAction()
	{
		$grid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements' => [
				[
					'selecter' => '#contentHtml',
					'html' => $grid
				],
				[
					'selecter' => '#leftHtml',
					'html' => ''
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}

	public function formAction()
	{

		$attribute = \Mage::getModel('Attribute');
		if ($id = $this->getRequest()->getGet('id')) {
			$attribute = $attribute->load($id);
			if (!$attribute) {
				throw new \Exception("No record Found");
			}
		}

		$form = \Mage::getBlock('Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
		$tab = \Mage::getBlock('Admin\Attribute\Edit\Tabs')->toHtml();
	
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements' => [
				[
					'selecter' => '#contentHtml',
					'html' => $form
				],
				[
					'selecter' => '#leftHtml',
					'html' => $tab
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}


	public function saveAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request");
			}
			$attribute = \Mage::getModel('Attribute');
			if ($id = $this->getRequest()->getGet('id')) {
				$attribute = $attribute->load($id);
				if (!$attribute) {
					throw new \Exception("Invalid attribute Id");
				}
				$this->getMessage()->setSuccess('Record updated successfully!!!');
			} 
			else
			{
				$this->getMessage()->setSuccess('Record inserted successfully!!!');
			}
			$attributeData = $this->getRequest()->getPost('attribute');
			$attribute->setData($attributeData);
			if ($attribute->save()) {
				if ($attribute->backendType == 'varchar') {
					$backendType  = $attribute->backendType.'(255)';
				} else {
					$backendType  = $attribute->backendType;
				}
				$sql = "ALTER TABLE `{$attribute->entityTypeId}` ADD {$attribute->code} {$backendType}";
				$attribute->getAdapter()->getConnect()->query($sql);
			} else {
				echo "Record not inserted";
			}
			

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();

		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $grid
				],
				[
					'selecter' => '#leftHtml',
					'html' => ''
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}

	public function deleteAction()
	{
		try {
			$attributeId = (int) $this->getRequest()->getGet('id');
			if (!$attributeId) {
				throw new \Exception("Invalid attribute method id.");
			}
			$attribute =  \Mage::getModel('Attribute');
			
			$attribute->load($attributeId);
			$column = $attribute->code;
			$table = $attribute->entityTypeId;
			if ($attribute->delete()) {

				$sql = "ALTER TABLE `{$table}` DROP COLUMN {$column} ";
				$attribute->getAdapter()->getConnect()->query($sql);

				$this->getMessage()->setSuccess('Record deleted successfully!!!');
			} else {
				$this->getMessage()->setFailure('Record not deleted!!!');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();

		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#contentHtml',
					'html' => $grid
				],
				[
					'selecter' => '#leftHtml',
					'html' => ''
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);
	}


}

?>