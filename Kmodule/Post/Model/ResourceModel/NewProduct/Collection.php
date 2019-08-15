<?php
namespace Kmodule\Post\Model\ResourceModel\NewProduct;
//collectionfactory
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'newproduct_id';
	protected $_eventPrefix = 'kmodule_post_newproduct_collection';
	protected $_eventObject = 'newproduct_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Kmodule\Post\Model\NewProduct', 'Kmodule\Post\Model\ResourceModel\NewProduct');
	}
}