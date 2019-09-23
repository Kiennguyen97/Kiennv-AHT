<?php
namespace KienAHT\Poll\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AnswerRepositoryInterface
{
    /**
     * Save Answer.
     *
     * @param \KienAHT\Poll\Api\Data\AnswerInterface $Answer
     * @return \KienAHT\Poll\Api\Data\AnswerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\KienAHT\Poll\Api\Data\AnswerInterface $Answer);

    /**
     * Retrieve Answer.
     *
     * @param int $AnswerId
     * @return \KienAHT\Poll\Api\Data\AnswerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($AnswerId);

    /**
     * Retrieve Answers matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \KienAHT\Poll\Api\Data\AnswerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Answer.
     *
     * @param \KienAHT\Poll\Api\Data\AnswerInterface $Answer
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\KienAHT\Poll\Api\Data\AnswerInterface $Answer);

    /**
     * Delete Answer by ID.
     *
     * @param int $AnswerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($AnswerId);
}