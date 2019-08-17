<?php
namespace KienAHT\Newp\Model;

use KienAHT\Newp\Api\Data;
use KienAHT\Newp\Api\NewproRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use KienAHT\Newp\Model\ResourceModel\Newpro as ResourceNewpro;
use KienAHT\Newp\Model\ResourceModel\Newpro\CollectionFactory as NewproCollectionFactory;
/**
 * Class NewproRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class NewproRepository implements NewproRepositoryInterface
{
    /**
     * @var ResourceNewpro
     */
    protected $resource;

    /**
     * @var NewproFactory
     */
    protected $NewproFactory;

    /**
     * @var NewproCollectionFactory
     */
    protected $NewproCollectionFactory;

    /**
     * @var Data\NewproSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceNewpro $resource
     * @param NewproFactory $NewproFactory
     * @param Data\NewproInterfaceFactory $dataNewproFactory
     * @param NewproCollectionFactory $NewproCollectionFactory
     * @param Data\NewproSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceNewpro $resource,
        NewproFactory $NewproFactory,
        Data\NewproInterfaceFactory $dataNewproFactory,
        NewproCollectionFactory $NewproCollectionFactory
    ) {
        $this->resource = $resource;
        $this->NewproFactory = $NewproFactory;
        $this->NewproCollectionFactory = $NewproCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Newpro data
     *
     * @param \KienAHT\Newp\Api\Data\NewproInterface $Newpro
     * @return Newpro
     * @throws CouldNotSaveException
     */
    public function save(\KienAHT\Newp\Api\Data\NewproInterface $Newpro)
    {
       
        try {
            $this->resource->save($Newpro);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Newpro: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Newpro;
    }

    /**
     * Load Newpro data by given Newpro Identity
     *
     * @param string $NewproId
     * @return Newpro
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($NewproId)
    {
        $Newpro = $this->NewproFactory->create();
        $Newpro->load($NewproId);
        if (!$Newpro->getId()) {
            throw new NoSuchEntityException(__('The CMS Newpro with the "%1" ID doesn\'t exist.', $NewproId));
        }
        return $Newpro;
    }

    /**
     * Load Newpro data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \KienAHT\Newp\Api\Data\NewproSearchResultsInterface
     */
    public function getList()
    {
        /** @var \KienAHT\Newp\Model\ResourceModel\Newpro\Collection $collection */
        $collection = $this->NewproCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Newpro
     *
     * @param \KienAHT\Newp\Api\Data\NewproInterface $Newpro
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\KienAHT\Newp\Api\Data\NewproInterface $Newpro)
    {
        try {
            $this->resource->delete($Newpro);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Newpro: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Newpro by given Newpro Identity
     *
     * @param string $NewproId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($NewproId)
    {
        return $this->delete($this->getById($NewproId));
    }
}