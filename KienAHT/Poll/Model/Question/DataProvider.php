<?php
namespace KienAHT\Poll\Model\Question;

use KienAHT\Poll\Model\ResourceModel\Question\CollectionFactory;
use KienAHT\Poll\Model\Question;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $questionCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $questionCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $question)
        {
            $this->_loadedData[$question->getId()] = $question->getData();
        }

        return $this->_loadedData;
    }
}