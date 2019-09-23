<?php
namespace KienAHT\Poll\Model\ResourceModel\Answer;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'answer_id';
	protected $_eventPrefix = 'kienaht_poll_answer_collection';
	protected $_eventObject = 'answer_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\Answer', 'KienAHT\Poll\Model\ResourceModel\Answer');
	}
}