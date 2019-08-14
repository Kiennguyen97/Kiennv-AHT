<?php
namespace AHT\AddPassword\Block\Adminhtml;

class Customer extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_customer';
		$this->_blockGroup = 'AHT_AddPassword';
		$this->_headerText = __('Customers');
		// $this->_addButtonLabel = __('Create New Customer'); //TODO: thêm nút create
		parent::_construct();
	}
}