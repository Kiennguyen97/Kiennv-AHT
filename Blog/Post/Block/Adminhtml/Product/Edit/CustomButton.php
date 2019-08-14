<?php 
namespace Blog\Post\Block\Adminhtml\Product\Edit;
//TODO: không cần để giống folder của nó chỉ cần giống tên file XML
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

class CustomButton extends Generic
{
    public function getButtonData()
    {
        return [
            'label' => __('Blog Post'),
            'class' => 'action-secondary',
            'data_attribute' => [
                'mage-init' => [
                    'Magento_Ui/js/form/button-adapter' => [
                        'actions' => [
                            [
                                'targetName' => 'product_form.product_form.add_attribute_modal',
                                'actionName' => 'toggleModal'
                            ],
                            [
                                'targetName' => 'product_form.product_form.add_attribute_modal.product_attributes_grid',
                                'actionName' => 'render'
                            ]
                        ]
                    ]
                ]
            ],
            'on_click' => '',
            'sort_order' => 10
        ];
    }
}
?>