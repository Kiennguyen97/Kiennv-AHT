<?php
namespace AHT\Blog\Ui\Component\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Changess extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
         if(isset($dataSource['data']['items'])) {
            foreach($dataSource['data']['items'] as &$item)
            {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl('blog/index/changepasswords', ['id' => $item['entity_id']]),
                    'label' => __('ChangePassword'),
                    'hidden' => false
                ];
            }
         }

        return $dataSource;
    }
}
