<?php 
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Customer\Session');

class Message extends Session
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function setSuccess($success)
	{
		$this->success = $success;
		return $this;
	}

	public function getSuccess()
	{
		return $this->success;
	}

	public function setFailure($failure)
	{
		$this->failure = $failure;
		return $this;
	}

	public function getFailure()
	{
		return $this->failure;
	}

	public function clearSuccess()
	{
		unset($this->success);
		return $this;
	}

	public function clearFailure() {

		unset($this->failure);
		return $this;
	}
}

?>