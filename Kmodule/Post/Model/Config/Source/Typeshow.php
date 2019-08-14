<?php

namespace Kmodule\Post\Model\Config\Source;

class Typeshow implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'yes', 'label' => __('slider')],
            ['value' => 'no', 'label' => __('list')]
        ];
    }
}