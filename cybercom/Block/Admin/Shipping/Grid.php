<?php 
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $shipping = null;
	protected $shippingDetails = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/grid.php');
	}

	public function setShipping($shipping = null)
	{
		if (!$shipping) {
			$shipping = \Mage::getModel('Shipping');
		}
		$this->shipping = $shipping;
		return $this;
	}

	public function getShipping()
	{
		if (!$this->shipping) {
			$this->setShipping();
		}
		return $this->shipping;
	}

	public function getShippingDetails()
	{
		if (!$this->shippingDetails) {
			$this->setShippingDetails();
		}
		return $this->shippingDetails;
	}

	public function setShippingDetails($shippingDetails = null)
	{
		if (!$shippingDetails) {
			$shipping = $this->getShipping();
			$shippingDetails = $shipping->fetchAll();
		}
		$this->shippingDetails = $shippingDetails;
		return $this;
	}

}
?>