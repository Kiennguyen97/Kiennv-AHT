<?php
namespace KienAHT\Newp\Controller\Adminhtml\Index;
class Add extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';
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
        \Magento\Framework\Controller\ResultFactory $result)
    {
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
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $newproductAdd = 0;
        $productAdded = 0;
        foreach($collection->getItems() as $product){
            $id = $product->getId();
            $p = $this->getLoadProduct($id);
            if(!$this->checkProduct($id)){
                $newproduct = $this->newproFactory->create();
                $newproduct->setName($p->getName());
                $newproduct->setProductid($product->getId());
                $this->newproRepository->save($newproduct);
                $newproductAdd++;
            }else{
                $productAdded++;
            }
            
        }
        if ($newproductAdd) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been added.', $newproductAdd)
            );
            
        }
        if($productAdded){
            $this->messageManager->addWarningMessage(
                __('A total of %1 record(s) had been added',$productAdded)
            );
        }
        return $this->resultRedirect->setPath('newp/*/');

    }
    public function checkProduct($id){
        $list = $this->newproRepository->getList();
        foreach ($list as $newpro) {
            # code...
            if($newpro->getProductid()==$id){
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