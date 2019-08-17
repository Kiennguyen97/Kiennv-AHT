<?php
namespace KienAHT\Newp\Block\Adminhtml\Newpro\Edit;
use Magento\Search\Controller\RegistryConstants;
class GenericButton
{
    protected $urlBuilder;
    protected $registry;
    public function __construct(
       \Magento\Backend\Block\Widget\Context $context,
       \Magento\Framework\Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }
    public function getId()
    {
        $newpro = $this->registry->registry('newpro');
        return $newpro ? $newpro->getId() : null;
    }
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}