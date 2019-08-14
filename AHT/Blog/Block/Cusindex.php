<?php
namespace AHT\Blog\Block;
class Cusindex extends \Magento\Framework\View\Element\Template
{	
	
	protected $_customerCollectionFactory;
	protected const PAGESIZE = 5;
        
    public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory
    )
    {   
        $this->_customerCollectionFactory = $customerCollectionFactory;    
        parent::__construct($context);
    }
    public function getCustomers(int $num = self::PAGESIZE)
    {	
        $collection = $this->_customerCollectionFactory->create(); //tạo object productcollection
        $collection->addAttributeToSelect('*');
		$collection->setPageSize($num); 
        return $collection;
    }

}