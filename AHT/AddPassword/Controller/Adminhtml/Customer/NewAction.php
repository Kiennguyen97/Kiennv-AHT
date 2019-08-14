<?php

namespace AHT\AddPassword\Controller\Adminhtml\Customer;

class NewAction extends \AHT\AddPassword\Controller\Adminhtml\Customer
{
    public function execute()
    {
        $this->_forward('edit');
    }
}