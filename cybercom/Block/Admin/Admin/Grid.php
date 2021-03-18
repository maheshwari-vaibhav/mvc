<?php 
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $admin = null;
	protected $admins = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/admin/grid.php');
	}

	public function setAdmin($admin = null)
	{
		if (!$admin) {
			$admin = \Mage::getModel('Admin');
		}
		$this->admin = $admin;
		return $this;
	}

	public function getAdmin()
	{
		if (!$this->admin) {
			$this->setAdmin();
		}
		return $this->admin;
	}

	public function getAdmins()
	{
		if (!$this->admins) {
			$this->setAdmins();
		}
		return $this->admins;
	}

	public function setAdmins($admins = null)
	{
		if (!$admins) {
			$admin = $this->getAdmin();
			$admins = $admin->fetchAll();
		}
		$this->admins = $admins;
		return $this;
	}

}
?>