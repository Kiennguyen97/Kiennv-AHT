<?php
namespace KienAHT\Newp\Block\Widget;
use Magento\Catalog\Block\Product\Widget\NewWidget;
class NewProductList extends NewWidget
{
    const DEFAULT_TITLE = 'Kien Custom Widget';

    const DEFAULT_SHOW_PAGER = true;

    protected $newproductRepository;
    protected $newproductList;
    protected $collection;

    //TODO: ORVERWRITE
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\Framework\App\Http\Context $httpContext,
        array $data = [],
        \Magento\Framework\Serialize\Serializer\Json $serializer = null,
        \KienAHT\Newp\Model\NewproRepository $newproductRepository
    ) {
        parent::__construct(
            $context,
            $productCollectionFactory,
            $catalogProductVisibility,
            $httpContext,
            $data,
            $serializer
        );
        $this->newproductRepository = $newproductRepository;
    }
    public function getnewpro(){
        return $this->newproductRepository->getList();
    }
    public function getpro(){
        return $this->_productCollectionFactory->create()->addAttributeToSelect('*');
    }
    public function checkNew($id){
        $newproductList = $this->newproductRepository->getList();
        foreach ($newproductList as $newproduct) {
            if ($newproduct->getProductid()==$id) {
                return true;
            }
        }
        return false;
    }
    protected function _getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*');
        foreach ($collection as $key => $product) {
            $id = $product->getId();
            if(!$this->checkNew($id)){
                $collection->removeItemByKey($key);
            }
        }

        $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());
        $collection = $this->_addProductAttributesAndPrices($collection)
        ->addStoreFilter()
        ->addAttributeToSort('created_at', 'desc')
        ->setPageSize($this->getPageSize())
        ->setCurPage($this->getCurrentPage());
        return $collection;
    }

    public function getProductsPerPage()
    {
        if (!$this->hasData('numberproduct_a_slide')) {
            if (!$this->hasData('products_per_page')) {
                # code...
                $this->setData('products_per_page',self::DEFAULT_PRODUCTS_PER_PAGE);
            }
            return $this->getData('products_per_page');
        }
        return $this->getData('numberproduct_a_slide');
    }

    public function getTitle(){
        if (!$this->hasData('title')) {
            $this->setData('title', self::DEFAULT_TITLE);
        }
        return $this->getData('title');
    }

    
    public function getDisplayType()
    {
        if (!$this->hasData('display_type')) {
            $this->setData('display_type', self::DISPLAY_TYPE_NEW_PRODUCTS);
        }
        return $this->getData('display_type');
    }
}