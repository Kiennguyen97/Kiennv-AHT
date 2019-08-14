<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Blog\Post\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class ResetButton
 */
class BlogButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('BlogPost'),
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
            'sort_order' => 99
        ];
    }
    // public function getButtonData()
    // {
    //     return [
    //         'label' => __('Blog Post'),
    //         'class' => 'action-secondary',
    //         'data_attribute' => [
    //             'mage-init' => [
    //                 'Magento_Ui/js/form/button-adapter' => [
    //                     'actions' => [
    //                         [
    //                             'targetName' => 'product_form.product_form.add_attribute_modal',
    //                             'actionName' => 'toggleModal'
    //                         ],
    //                         [
    //                             'targetName' => 'product_form.product_form.add_attribute_modal.product_attributes_grid',
    //                             'actionName' => 'render'
    //                         ]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //         'on_click' => '',
    //         'sort_order' => 10
    //     ];
    // }
}
