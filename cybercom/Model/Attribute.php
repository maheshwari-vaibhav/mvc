<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Attribute extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	const ENTITY_PRODUCT = 'product';
	const ENTITY_CATEGORY = 'category';
	const ENTITY_CUSTOMER = 'customer';

	const INPUT_TEXT = 'text';
	const INPUT_RADIO = 'radio';
	const INPUT_CHECKBOX = 'checkbox';
	const INPUT_SELECT = 'select';
	const INPUT_MULTI = 'multi';
	const INPUT_TEXTAREA = 'textarea';

	const BACKEND_VARCHAR = 'varchar';
	const BACKEND_INT = 'int';
	const BACKEND_TINYINT = 'tinyint';


	function __construct()
	{
		parent::__construct();
		$this->setTableName('attribute');
		$this->setPrimaryKey('attributeId');
	}
	public function getStatusOptions()
	{
		return [
			self::STATUS_ENABLED => 'Enabled',
			self::STATUS_DISABLED => 'Disabled'
		];
	}

	public function getEntityTypes()
	{
		return [
			self::ENTITY_PRODUCT => 'Product',
			self::ENTITY_CATEGORY => 'Category',
			self::ENTITY_CUSTOMER => 'Customer'

		];
	}

	public function getInputTypes()
	{
		return [
			self::INPUT_TEXT => 'Text Field',
			self::INPUT_RADIO => 'Radio Button',
			self::INPUT_CHECKBOX => 'CheckBox',
			self::INPUT_TEXTAREA => 'Text Area',
			self::INPUT_SELECT => 'Select',
			self::INPUT_MULTI => 'Multi Select'

		];
	}

	public function getBackendTypes()
	{
		return [
			self::BACKEND_VARCHAR => 'Varchar',
			self::BACKEND_INT => 'Int',
			self::BACKEND_TINYINT => 'Tinyint'

		];
	}

	public function getOptions()
	{
		$attributeOption = \Mage::getModel('Attribute\Option');
		$key = $this->getPrimaryKey();
		$sql = "SELECT * FROM `{$attributeOption->getTableName()}` WHERE {$key} = '{$this->$key}' ORDER BY sortOrder";
		return $attributeOption->fetchAll($sql);
	}
}
?>