<?php

namespace KienAHT\Newp\Block\Product\Widget;

use Magento\Catalog\Block\Product\Widget\NewWidget;

class NewProductList extends NewWidget
{
    const DEFAULT_TITLE = 'Kien Custom Widget';

    const DEFAULT_PRODUCTS_COUNT = 10;

    const DEFAULT_TEMPLATE_KIEN = 'widget/newlist.phtml';

    protected $newproductRepository;


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


    public function getnewpro()
    {
        return $this->newproductRepository->getList();
    }
    public function getpro()
    {
        return $this->_productCollectionFactory->create()->addAttributeToSelect('*')->setPageSize($this->getProductsPerPage());
    }


    public function getArray()
    {
        $productId = [];
        $newproductList = $this->newproductRepository->getList();
        foreach ($newproductList as $newproduct) {
            array_push($productId, $newproduct->getProductid());
        }
        return $productId;
    }
    protected function _getProductCollection()
    {
        if ($this->getShow() == 'widget/newslider.phtml') {
            # code...
            $collection = $this->_productCollectionFactory->create()
                ->addFieldToFilter('entity_id', ['in' => $this->getArray()]);
            $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());
            $collection = $this->_addProductAttributesAndPrices($collection)
                ->addStoreFilter()
                ->addAttributeToSort('created_at', 'desc')
                ->setPageSize($this->getProductsCount());
            return $collection;
        }
        $collection = $this->_productCollectionFactory->create()
            ->addFieldToFilter('entity_id', ['in' => $this->getArray()]);
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
                $this->setData('products_per_page', self::DEFAULT_PRODUCTS_PER_PAGE);
            }
            return $this->getData('products_per_page');
        }
        return $this->getData('numberproduct_a_slide');
    }

    public function getShow()
    {
        if (!$this->hasData('template')) {
            $this->setData('template', self::DEFAULT_TEMPLATE_KIEN);
        }
        return $this->getData('template');
    }

    public function getTitle()
    {
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
