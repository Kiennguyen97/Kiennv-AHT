<?php
namespace KienAHT\Newp\Model\ResourceModel\Newpro;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'newpro_id';
	protected $_eventPrefix = 'kienaht_newp_newpro_collection';
	protected $_eventObject = 'newpro_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('KienAHT\Newp\Model\Newpro', 'KienAHT\Newp\Model\ResourceModel\Newpro');
	}
}