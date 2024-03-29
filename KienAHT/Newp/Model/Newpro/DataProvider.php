<?php
namespace KienAHT\Newp\Model\Newpro;

use KienAHT\Newp\Model\ResourceModel\Newpro\CollectionFactory;
use KienAHT\Newp\Model\Newpro;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $contactCollectionFactory->create();
        
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $contact)
        {
            $this->_loadedData[$contact->getId()] = $contact->getData();
        }

        return $this->_loadedData;
    }
    // public function addFilter(\Magento\Framework\Api\Filter $filter)
    // {
    //     $field = $filter->getField();

    //     if (in_array($field, ['id','name'])) {
    //         $filter->setField($field);
    //     }

    //     parent::addFilter($filter);
    // }
}