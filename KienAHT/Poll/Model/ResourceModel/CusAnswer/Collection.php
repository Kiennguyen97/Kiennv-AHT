<?php
namespace KienAHT\Poll\Model\ResourceModel\CusAnswer;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'customer_answerid';
	protected $_eventPrefix = 'kienaht_poll_customer_answer_collection';
	protected $_eventObject = 'customer_answer_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\CusAnswer', 'KienAHT\Poll\Model\ResourceModel\CusAnswer');
	}
}