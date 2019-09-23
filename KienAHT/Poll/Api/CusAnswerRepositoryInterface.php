<?php
namespace KienAHT\Poll\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CusAnswerRepositoryInterface
{
    /**
     * Save CusAnswer.
     *
     * @param \KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer
     * @return \KienAHT\Poll\Api\Data\CusAnswerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer);

    /**
     * Retrieve CusAnswer.
     *
     * @param int $CusAnswerId
     * @return \KienAHT\Poll\Api\Data\CusAnswerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($CusAnswerId);

    /**
     * Retrieve CusAnswers matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \KienAHT\Poll\Api\Data\CusAnswerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete CusAnswer.
     *
     * @param \KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer);

    /**
     * Delete CusAnswer by ID.
     *
     * @param int $CusAnswerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($CusAnswerId);
}