<?php
namespace AHT\Blog\Block;

class Cusedit extends \Magento\Framework\View\Element\Template
{
	private $_customerFactory;
	private $_customerRegistry;
	private $_coreRegistry;
    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context, 
    \Magento\Customer\Model\CustomerFactory $customerFactory, 
	\Magento\Customer\Model\CustomerRegistry $customerRegistry,
	\Magento\Framework\Registry $coreRegistry)

	{
		parent::__construct($context);
		$this->_customerFactory = $customerFactory;
		$this->_customerRegistry = $customerRegistry;
		$this->_coreRegistry = $coreRegistry;
	}

	public function getBlogInfo()
	{
		return __('AHT Blog module');
	}
	public function getPassword($cus){
		
		return $this->_encryption->decrypt($cus->getPasswordHash());;
	}
	public function getCustomer()
	{
        $customer_id = $this->_coreRegistry->registry('cus_id'); // lấy ra từ session do controller Cusedit đã lưu lại
		// $customer = $this->_customerRegistry->retrieve($customer_id); //TODO: có nhiều cách để lấy ra một đối tượng
		$customer = $this->_customerFactory->create()->load($customer_id);
		return $customer;
	}
	public function execute()
	{
		return $this->_pageFactory->create();
	}
}