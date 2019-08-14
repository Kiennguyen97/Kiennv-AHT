<?php

namespace AHT\AddPassword\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Customer extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'AHT_AddPassword::addpasword'
        )->_addBreadcrumb(
            __('AddPassword'),
            __('AddPassword')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_AddPassword::addpassword');
    }
}