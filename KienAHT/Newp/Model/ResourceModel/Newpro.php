<?php
//Newprofactory
namespace KienAHT\Newp\Model\ResourceModel;
class Newpro extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('kienaht_newp_newpro', 'newpro_id');
    }
}
