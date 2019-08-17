<?php
namespace KienAHT\Newp\Model;

use KienAHT\Newp\Api\Data\NewproInterface;

class Newpro extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, NewproInterface
{
	const CACHE_TAG = 'kienaht_newp_newpro';

	protected $_cacheTag = 'kienaht_newp_newpro';

	protected $_eventPrefix = 'kienaht_newp_newpro';

	protected function _construct()
	{
		$this->_init('KienAHT\Newp\Model\ResourceModel\Newpro');
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