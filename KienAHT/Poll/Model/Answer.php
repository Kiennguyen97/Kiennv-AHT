<?php
namespace KienAHT\Poll\Model;

use KienAHT\Poll\Api\Data\AnswerInterface;

class Answer extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, AnswerInterface
{
	const CACHE_TAG = 'kienaht_poll_answer';

	protected $_cacheTag = 'kienaht_poll_answer';

	protected $_eventPrefix = 'kienaht_poll_answer';

	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\ResourceModel\Answer');
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