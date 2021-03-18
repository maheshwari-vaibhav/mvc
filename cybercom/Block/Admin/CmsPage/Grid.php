<?php
namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
	
	protected $cmsPages = [];
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/cmspage/grid.php');
		$this->setCmsPages();
	}

	public function setCmsPages()
	{
		$cmsPage = \Mage::getModel('CmsPage');
		$this->cmsPages = $cmsPage->fetchAll();
		return $this;
	}

	public function getCmsPages()
	{
		return $this->cmsPages;
	}
}