<?php
namespace AHT\Blog\Controller\Adminhtml\Index;

class Changepasswords extends \Magento\Backend\App\Action
{

//    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_registry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
