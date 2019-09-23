<?php
namespace KienAHT\Poll\Model;

use KienAHT\Poll\Api\Data;
use KienAHT\Poll\Api\CusAnswerRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use KienAHT\Poll\Model\ResourceModel\CusAnswer as ResourceCusAnswer;
use KienAHT\Poll\Model\ResourceModel\CusAnswer\CollectionFactory as CusAnswerCollectionFactory;
/**
 * Class CusAnswerRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CusAnswerRepository implements CusAnswerRepositoryInterface
{
    /**
     * @var ResourceCusAnswer
     */
    protected $resource;

    /**
     * @var CusAnswerFactory
     */
    protected $CusAnswerFactory;

    /**
     * @var CusAnswerCollectionFactory
     */
    protected $CusAnswerCollectionFactory;

    /**
     * @var Data\CusAnswerSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceCusAnswer $resource
     * @param CusAnswerFactory $CusAnswerFactory
     * @param Data\CusAnswerInterfaceFactory $dataCusAnswerFactory
     * @param CusAnswerCollectionFactory $CusAnswerCollectionFactory
     * @param Data\CusAnswerSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceCusAnswer $resource,
        CusAnswerFactory $CusAnswerFactory,
        Data\CusAnswerInterfaceFactory $dataCusAnswerFactory,
        CusAnswerCollectionFactory $CusAnswerCollectionFactory
    ) {
        $this->resource = $resource;
        $this->CusAnswerFactory = $CusAnswerFactory;
        $this->CusAnswerCollectionFactory = $CusAnswerCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save CusAnswer data
     *
     * @param \KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer
     * @return CusAnswer
     * @throws CouldNotSaveException
     */
    public function save(\KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer)
    {
       
        try {
            $this->resource->save($CusAnswer);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the CusAnswer: %1', $exception->getMessage()),
                $exception
            );
        }
        return $CusAnswer;
    }

    /**
     * Load CusAnswer data by given CusAnswer Identity
     *
     * @param string $CusAnswerId
     * @return CusAnswer
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($CusAnswerId)
    {
        $CusAnswer = $this->CusAnswerFactory->create();
        $CusAnswer->load($CusAnswerId);
        if (!$CusAnswer->getId()) {
            throw new NoSuchEntityException(__('The CMS CusAnswer with the "%1" ID doesn\'t exist.', $CusAnswerId));
        }
        return $CusAnswer;
    }

    /**
     * Load CusAnswer data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \KienAHT\Poll\Api\Data\CusAnswerSearchResultsInterface
     */
    public function getList()
    {
        /** @var \KienAHT\Poll\Model\ResourceModel\CusAnswer\Collection $collection */
        $collection = $this->CusAnswerCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete CusAnswer
     *
     * @param \KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\KienAHT\Poll\Api\Data\CusAnswerInterface $CusAnswer)
    {
        try {
            $this->resource->delete($CusAnswer);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CusAnswer: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete CusAnswer by given CusAnswer Identity
     *
     * @param string $CusAnswerId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($CusAnswerId)
    {
        return $this->delete($this->getById($CusAnswerId));
    }
}