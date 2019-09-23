<?php
namespace KienAHT\Poll\Model;

use KienAHT\Poll\Api\Data\CusAnswerInterface;

class CusAnswer extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, CusAnswerInterface
{
	const CACHE_TAG = 'kienaht_poll_customer_answer';

	protected $_cacheTag = 'kienaht_poll_customer_answer';

	protected $_eventPrefix = 'kienaht_poll_customer_answer';

	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\ResourceModel\CusAnswer');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}