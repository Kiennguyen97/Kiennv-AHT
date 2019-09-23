<?php
namespace KienAHT\Poll\Model\CusAnswer;

use KienAHT\Poll\Model\ResourceModel\CusAnswer\CollectionFactory;
use KienAHT\Poll\Model\CusAnswer;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $cusanswerCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $cusanswerCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $cusanswer)
        {
            $this->_loadedData[$cusanswer->getId()] = $cusanswer->getData();
        }

        return $this->_loadedData;
    }
}