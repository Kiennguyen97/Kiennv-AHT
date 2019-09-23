<?php
namespace KienAHT\Poll\Model\Answer;

use KienAHT\Poll\Model\ResourceModel\Answer\CollectionFactory;
use KienAHT\Poll\Model\Answer;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $answerCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $answerCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $answer)
        {
            $this->_loadedData[$answer->getId()] = $answer->getData();
        }

        return $this->_loadedData;
    }
}