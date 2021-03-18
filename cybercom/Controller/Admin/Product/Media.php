<?php 
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Controller\Core\Admin {

	public function __construct()
	{
		Parent::__construct();
	}

	public function uploadMediaAction()
	{
		$location = $_SERVER['DOCUMENT_ROOT'].'/cybercom/uploads/';
		try {

			if (isset($_FILES['file']['name'])) {
				$name = rand().$_FILES['file']['name'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
				if (!empty($name)) {
					if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
						if (move_uploaded_file($tmp_name,$location.$name)) {
							$media = \Mage::getModel('Product\Media');
							$media->productId = $this->getRequest()->getGet('id');
							$media->path = $name;
							$media->save();
				
						} else {
							throw new \Exception("Image Not Uploaded");
							
						}
					} else {
						throw new \Exception("extension Not Uploaded");
					}
				} else {
					throw new \Exception("Image not selected");
				}
			} else {
				throw new \Exception("Image not selected");
			}
			
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		$product = \Mage::getModel("Product");
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("No record Found");
			}
		}

		$edit = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'i am excellent',
			'elements'=> [
				[
					'selecter' => '#editContent',
					'html' => $edit
				]
			]
		];
		header("Content-type:application/json");
		echo json_encode($response);

	}

	public function updateMediaAction()
	{
		try {

			$label = $this->getRequest()->getPost('label');
			$small = $this->getRequest()->getPost('small');
			$thumb = $this->getRequest()->getPost('thumb');
			$base = $this->getRequest()->getPost('base');
			$gallary = $this->getRequest()->getPost('gallary');
			if (!$small || !$thumb || !$base) {
				throw new \Exception("Error Processing Request");
			}
			$media = \Mage::getModel('Product\Media');
			foreach ($label as $key => $value) {
				$media->load($key);
				$media->label = $value;

				if ($key == $small[0]) {
					$media->small = 1;
				}
				else {
					$media->small = 0;
				}

				if ($key == $thumb[0]) {
					$media->thumb = 1;
				}
				else {
					$media->thumb = 0;
				}

				if ($key == $base[0]) {
					$media->base = 1;
				}
				else {
					$media->base = 0;
				}

				if (array_key_exists($key, $gallary)) {
					$media->gallary = 1;
				}
				else {
					$media->gallary = 0;
				}
				$media->save();
			}

			$product = \Mage::getModel("Product");
			if ($id = $this->getRequest()->getGet('id')) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("No record Found");
				}
			}

			$edit = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();

			$response = [
				'status' => 'success',
				'message' => 'i am excellent',
				'elements'=> [
					[
						'selecter' => '#editContent',
						'html' => $edit
					]
				]
			];
			header("Content-type:application/json");
			echo json_encode($response);
			
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

	}

	public function deleteMediaAction()
	{
		try {
			$location = $_SERVER['DOCUMENT_ROOT'].'/cybercom/uploads/';
			$remove = $this->getRequest()->getPost('remove');
			if (!$remove) {
				throw new \Exception("No record selected");
				
			}
			$media = \Mage::getModel('Product\Media');
			foreach ($remove as $key => $value) {
				$media->load($key);
				unlink($location.$media->path);
				$media->delete();
			}
			$product = \Mage::getModel("Product");
			if ($id = $this->getRequest()->getGet('id')) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("No record Found");
				}
			}

			$edit = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();

			$response = [
				'status' => 'success',
				'message' => 'i am excellent',
				'elements'=> [
					[
						'selecter' => '#editContent',
						'html' => $edit
					]
				]
			];
			header("Content-type:application/json");
			echo json_encode($response);
			
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

}


?>