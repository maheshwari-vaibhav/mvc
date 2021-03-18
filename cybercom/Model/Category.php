<?php 
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Category extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('category');
		$this->setPrimaryKey('categoryId');
	}

	public function getStatusOptions()
	{
		return [
			self::STATUS_ENABLED => 'Enabled',
			self::STATUS_DISABLED => 'Disabled'
		];
	}

	public function setParent($parentId,$categoryId)
	{

		$sql = "select * from category where parentId = '{$categoryId}'";
		$childern = $this->fetchAll($sql);
		foreach ($childern->getData() as $key => $child) {
			
			$category = $this->load($child->categoryId);
			$category->parentId = $parentId;
			$category->save();
		}
		$this->setPath($parentId);
	}

	public function setPath($id)
	{
		$sql = "select * from category where path LIKE '{$id}/%' or categoryId = '{$id}' or  path LIKE '%/{$id}/%' or path LIKE '%/{$id}'";
		$childern = $this->fetchAll($sql);
		foreach ($childern->getData() as $key => $child) {
			
			$path = '';
			$id = $child->categoryId;

			if ($child->parentId) {
				$category = $this->load($child->parentId);
				$path = $category->path.'/'.$id;
			}
			else
			{
				$path = $id;
			}
			$category = $this->load($id);
			$category->path = $path;
			$category->save();
		}
	}
}
?>