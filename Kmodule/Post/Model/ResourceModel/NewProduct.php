<?php
//NewProductfactory
namespace Kmodule\Post\Model\ResourceModel;
class NewProduct extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('kmodule_post_newproduct', 'newproduct_id');
    }
}