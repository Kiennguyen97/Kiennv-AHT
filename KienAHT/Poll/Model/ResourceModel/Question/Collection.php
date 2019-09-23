<?php
namespace KienAHT\Poll\Model\ResourceModel\Question;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'question_id';
	protected $_eventPrefix = 'kienaht_poll_question_collection';
	protected $_eventObject = 'question_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\Question', 'KienAHT\Poll\Model\ResourceModel\Question');
	}
}