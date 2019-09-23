<?php
namespace KienAHT\Poll\Model;

use KienAHT\Poll\Api\Data\QuestionInterface;

class Question extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, QuestionInterface
{
	const CACHE_TAG = 'kienaht_poll_question';

	protected $_cacheTag = 'kienaht_poll_question';

	protected $_eventPrefix = 'kienaht_poll_question';

	protected function _construct()
	{
		$this->_init('KienAHT\Poll\Model\ResourceModel\Question');
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