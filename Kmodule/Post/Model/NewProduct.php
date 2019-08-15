<?php
namespace Kmodule\Post\Model;

use Kmodule\Post\Api\Data\NewProductInterface;

class NewProduct extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, NewProductInterface
{
	const CACHE_TAG = 'kmodule_post_newproduct';

	protected $_cacheTag = 'kmodule_post_newproduct';

	protected $_eventPrefix = 'kmodule_post_newproduct';

	protected function _construct()
	{
		$this->_init('Kmodule\Post\Model\ResourceModel\NewProduct');
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