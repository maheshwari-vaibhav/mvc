<?php 
namespace Model\Core;

class Table
{
	protected $primaryKey = null;
	protected $tableName = null;
	protected $adapter = null;
	protected $data = [];

	function __construct()
	{
		
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName()
	{
		return $this->tableName;
	}

	public function setData(array $data)
	{
		$this->data = array_merge($this->data,$data);
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setAdapter()
	{
		$this->adapter = \Mage::getModel('Core\Adapter');
		return $this;
	}

	public function getAdapter()
	{
		if (!$this->adapter) {
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function __set($key, $value)
	{
		$this->data[$key] = $value;
		return $this;
	}

	public function __get($key)
	{
		if (!array_key_exists($key, $this->data)) {
			return null;
		}
		return $this->data[$key];
	}

	public function save()
	{

		if (!array_key_exists($this->getPrimaryKey(), $this->data)) {

			$keys = implode(", " ,array_keys($this->data));
	        $values = "'".implode("', '" ,array_values($this->data))."'";
	        $sql = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
	        $id = $this->getAdapter()->insert($sql);

		} else {

			$id = $this->data[$this->getPrimaryKey()];
			$sql = "update `{$this->getTableName()}` set ";
			foreach ($this->data as $key => $value) {
				$sql .= "`{$key}` = '{$value}', ";
			}
			$sql = substr($sql, 0, -2);
			$sql .= " where `{$this->getPrimaryKey()}` = {$id}";
			$this->getAdapter()->update($sql);
		}
			
	    $this->load($id);
	    return $this;
	}

	public function load($value,$key =  null)
	{
		if (!$key) {
			$sql = "select *  from  `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = '{$value}'";
		}
		else
		{
			$sql = "select *  from  `{$this->getTableName()}` where `{$key}` = '{$value}'";
		}
		
		return $this->fetchRow($sql);
	}

	public function fetchRow($sql)
	{
		$row = $this->getAdapter()->fetchRow($sql);
		if (!$row) {
			return false;
		}
		$this->data = $row;
		return $this;
	}

	public function delete($sql = null)
	{
		if (!$sql) {
			$sql = "delete from `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$this->data[$this->getPrimaryKey()]}'";
		}
		$result = $this->getAdapter()->delete($sql);
		return $result;
	}

	public function fetchAll($sql = null)
	{
		$className = get_called_class().'\Collection';
		$className = str_replace('Model\\', '', $className);
		$collection = \Mage::getModel($className);

		if (!$sql) {
			$sql = "select * from `{$this->getTableName()}`";
		}
		
		$rows = $this->getAdapter()->fetchAll($sql);
		if (!$rows) {
			return $collection;
		}

		foreach ($rows as $key => &$value) {
			$row = new $this;
			$value = $row->setData($value);
		}
		$collection->setData($rows);
		return $collection;
	}
}
?>