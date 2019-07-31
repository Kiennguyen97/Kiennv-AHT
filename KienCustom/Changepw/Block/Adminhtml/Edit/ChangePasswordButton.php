<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace KienCustom\Changepw\Block\Adminhtml\Edit;

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;

/**
 * Class DeleteButton
 *
 * @package Magento\Customer\Block\Adminhtml\Edit
 */
class ChangePasswordButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @var AccountManagementInterface
     */
    protected $customerAccountManagement;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param AccountManagementInterface $customerAccountManagement
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        AccountManagementInterface $customerAccountManagement
    ) {
        parent::__construct($context, $registry);
        $this->customerAccountManagement = $customerAccountManagement;
    }

    /**
     * Get button data.
     *
     * @return array
     */
    public function getButtonData()
    {
        $customerId = $this->getCustomerId();
        $canModify = $customerId && !$this->customerAccountManagement->isReadonly($this->getCustomerId());
        $data = [];
        if ($customerId && $canModify) {
            $data = [
                'label' => __('ChangePassword'),
                'class' => 'action-secondary',
                'data_attribute' => [
                    'url' => $this->getChangePassUrl()
                ],
                'on_click' => sprintf("location.href = '%s';", $this->getChangePassUrl()),
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get delete url.
     *
     * @return string
     */
    public function getChangePassUrl()
    {
        return $this->getUrl('changepw/index/changepass', ['id' => $this->getCustomerId()]);
    }
}
