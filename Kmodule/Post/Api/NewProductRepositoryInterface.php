<?php
namespace Kmodule\Post\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NewProductRepositoryInterface
{
    /**
     * Save NewProduct.
     *
     * @param \Kmodule\Post\Api\Data\NewProductInterface $NewProduct
     * @return \Kmodule\Post\Api\Data\NewProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Kmodule\Post\Api\Data\NewProductInterface $NewProduct);

    /**
     * Retrieve NewProduct.
     *
     * @param int $NewProductId
     * @return \Kmodule\Post\Api\Data\NewProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($NewProductId);

    /**
     * Retrieve NewProducts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Kmodule\Post\Api\Data\NewProductSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete NewProduct.
     *
     * @param \Kmodule\Post\Api\Data\NewProductInterface $NewProduct
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Kmodule\Post\Api\Data\NewProductInterface $NewProduct);

    /**
     * Delete NewProduct by ID.
     *
     * @param int $NewProductId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($NewProductId);
}