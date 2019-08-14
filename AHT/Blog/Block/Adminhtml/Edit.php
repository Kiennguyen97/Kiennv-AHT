<?php

namespace AHT\Blog\Block\Adminhtml;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml';
        $this->_blockGroup = 'AHT_Blog';

        parent::_construct();
        //TODO: thêm nút SAVE and continue tước đó đã có nút back,delete  và reset trong form sẵn rồi trong \Magento\Backend\Block\Widget\Form\Container
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit hi ha'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                ]
            ],
            -100
        );
    }

    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('blog_post')->getId()) {
            return __('Edit %1', $this->_coreRegistry->registry('blog_post')->getName());
        } else {
            return __('New Item');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}