<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class CmsPage extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		parent::__construct();
		$this->setTableName('cms_page')->setPrimaryKey('pageId');
	}

	public function getStatusOptions()
	{
		return [
			self::STATUS_DISABLED => 'Disabled',
			self::STATUS_ENABLED => 'Enabled'
		];
	}
}