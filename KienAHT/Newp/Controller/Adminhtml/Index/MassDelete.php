<?php

namespace KienAHT\Newp\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;


class MassDelete extends \Magento\Backend\App\Action
{


    const ADMIN_RESOURCE = 'KienAHT_Newp::newpro';
    protected $_filter;
    protected $_newproRepository;
    protected $_newproCollectionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $Filter,
        \KienAHT\Newp\Api\NewproRepositoryInterface $newproRepositoryInterface,
        \KienAHT\Newp\Model\ResourceModel\Newpro\CollectionFactory $newproCollectionFactory
    ) {
        $this->_filter = $Filter;
        $this->_newproRepository = $newproRepositoryInterface;
        $this->_newproCollectionFactory = $newproCollectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_newproCollectionFactory->create());
        $newproductDeleted = 0;
        foreach ($collection->getItems() as  $newproduct) {
            $this->_newproRepository->delete($newproduct);
            $newproductDeleted++;
        }
        if ($newproductDeleted) {
            $this->messageManager->addSuccessMessage(__('A total of %1 newproducts have been deleted.', $newproductDeleted));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('newp/*/index');
    }
}
