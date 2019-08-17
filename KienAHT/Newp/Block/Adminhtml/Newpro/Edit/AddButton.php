<?php
namespace KienAHT\Newp\Block\Adminhtml\Newpro\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class AddButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Add'),
            'class' => 'action-secondary',
            'on_click' => sprintf("location.href= '%s';", $this->getAddUrl()),
            'sort_order' => 10
        ];
    }

    public function getAddUrl()
    {
        return $this->getUrl('catalog/product/index');
    }
}