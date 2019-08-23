<?php

namespace KienAHT\Newp\Controller\Adminhtml\Index;

class Add extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'KienAHT_Newp::newpro';
    protected $filter;
    protected $resultPageFactory;
    protected $collectionFactory;
    protected $newproRepository;
    protected $newproFactory;
    protected $productFactory;
    protected $collectionNewproFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \KienAHT\Newp\Model\ResourceModel\Newpro\CollectionFactory $collectionNewproFactory,
        \KienAHT\Newp\Model\NewproRepository $newproRepository,
        \KienAHT\Newp\Model\NewproFactory $newproFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\Controller\ResultFactory $result
    ) {
        $this->collectionNewproFactory = $collectionNewproFactory;
        $this->filter = $filter;
        $this->newproRepository = $newproRepository;
        $this->newproFactory = $newproFactory;
        $this->collectionFactory = $collectionFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirect = $result;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $this->resultRedirect = $this->resultRedirectFactory->create();
        // $collection =$this->collectionFactory->create()->addAttributeToFilter('type_id', 'configurable');
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $newproductAdd = 0;
        $productAdded = 0;
        $errorType = 0;
        // foreach ($collection as $key => $product) {
        //     $id = $product->getId();
        //     if (!$this->checkNew($id)) {
        //         $collection->removeItemByKey($key);
        //     }
        // }
        foreach ($collection->getItems() as $product) {
            $id = $product->getId();
            $type = $product->getTypeId();
            $p = $this->getLoadProduct($id);
            if (!$this->checkProduct($id)) {
                if ($this->checkType($type)) {
                    $newproduct = $this->newproFactory->create();
                    $newproduct->setName($p->getName());
                    $newproduct->setProductid($product->getId());
                    $this->newproRepository->save($newproduct);
                    $newproductAdd++;
                } else {
                    $errorType++;
                    # code...
                }
                // $newproduct = $this->newproFactory->create();
                // $newproduct->setName($p->getName());
                // $newproduct->setProductid($product->getId());
                // $this->newproRepository->save($newproduct);
                // $newproductAdd++;
            } else {
                $productAdded++;
            }
        }
        if ($newproductAdd) {
            $this->messageManager->addSuccessMessage(
                __('Total of %1 record(s) have been added.', $newproductAdd)
            );
        }
        if ($productAdded) {
            $this->messageManager->addWarningMessage(
                __('Total of %1 record(s) had been added', $productAdded)
            );
        }
        if ($errorType != 0) {
            $this->messageManager->addWarningMessage(
                __('Total of %1 record(s) were not Configurable Product Type can;t add to NewProduct', $errorType)
            );
        }
        return $this->resultRedirect->setPath('newp/*/');
    }
    public function checkType($type)
    {
        # code...
        if ($type == 'configurable') {
            return true;
        }
        return false;
    }
    public function checkProduct($id)
    {
        $list = $this->newproRepository->getList();
        foreach ($list as $newpro) {
            # code...
            if ($newpro->getProductid() == $id) {
                return true;
            }
        }
        return false;
    }
    public function getLoadProduct($id)
    {
        return $this->productFactory->create()->load($id);
    }
}
