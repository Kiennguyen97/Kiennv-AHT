<?php
namespace KienAHT\Newp\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NewproRepositoryInterface
{
    /**
     * Save Newpro.
     *
     * @param \KienAHT\Newp\Api\Data\NewproInterface $Newpro
     * @return \KienAHT\Newp\Api\Data\NewproInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\KienAHT\Newp\Api\Data\NewproInterface $Newpro);

    /**
     * Retrieve Newpro.
     *
     * @param int $NewproId
     * @return \KienAHT\Newp\Api\Data\NewproInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($NewproId);

    /**
     * Retrieve Newpros matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \KienAHT\Newp\Api\Data\NewproSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Newpro.
     *
     * @param \KienAHT\Newp\Api\Data\NewproInterface $Newpro
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\KienAHT\Newp\Api\Data\NewproInterface $Newpro);

    /**
     * Delete Newpro by ID.
     *
     * @param int $NewproId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($NewproId);
}