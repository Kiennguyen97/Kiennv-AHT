<?php
namespace KienAHT\Poll\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface QuestionRepositoryInterface
{
    /**
     * Save Question.
     *
     * @param \KienAHT\Poll\Api\Data\QuestionInterface $Question
     * @return \KienAHT\Poll\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\KienAHT\Poll\Api\Data\QuestionInterface $Question);

    /**
     * Retrieve Question.
     *
     * @param int $QuestionId
     * @return \KienAHT\Poll\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($QuestionId);

    /**
     * Retrieve Questions matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \KienAHT\Poll\Api\Data\QuestionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Question.
     *
     * @param \KienAHT\Poll\Api\Data\QuestionInterface $Question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\KienAHT\Poll\Api\Data\QuestionInterface $Question);

    /**
     * Delete Question by ID.
     *
     * @param int $QuestionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($QuestionId);
}