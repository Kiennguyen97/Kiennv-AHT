<?php

namespace KienAHT\Newp\Api\Data;

interface NewproSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Post list.
     * @return \AHT\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \AHT\Blog\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}