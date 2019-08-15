<?php
namespace Kmodule\Post\Model;

use Kmodule\Post\Api\Data;
use Kmodule\Post\Api\NewProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Kmodule\Post\Model\ResourceModel\NewProduct as ResourceNewProduct;
use Kmodule\Post\Model\ResourceModel\NewProduct\CollectionFactory as NewProductCollectionFactory;
/**
 * Class NewProductRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class NewProductRepository implements NewProductRepositoryInterface
{
    /**
     * @var ResourceNewProduct
     */
    protected $resource;

    /**
     * @var NewProductFactory
     */
    protected $NewProductFactory;

    /**
     * @var NewProductCollectionFactory
     */
    protected $NewProductCollectionFactory;

    /**
     * @var Data\NewProductSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceNewProduct $resource
     * @param NewProductFactory $NewProductFactory
     * @param Data\NewProductInterfaceFactory $dataNewProductFactory
     * @param NewProductCollectionFactory $NewProductCollectionFactory
     * @param Data\NewProductSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceNewProduct $resource,
        NewProductFactory $NewProductFactory,
        Data\NewProductInterfaceFactory $dataNewProductFactory,
        NewProductCollectionFactory $NewProductCollectionFactory
    ) {
        $this->resource = $resource;
        $this->NewProductFactory = $NewProductFactory;
        $this->NewProductCollectionFactory = $NewProductCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save NewProduct data
     *
     * @param \Kmodule\Post\Api\Data\NewProductInterface $NewProduct
     * @return NewProduct
     * @throws CouldNotSaveException
     */
    public function save(\Kmodule\Post\Api\Data\NewProductInterface $NewProduct)
    {
       
        try {
            $this->resource->save($NewProduct);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the NewProduct: %1', $exception->getMessage()),
                $exception
            );
        }
        return $NewProduct;
    }

    /**
     * Load NewProduct data by given NewProduct Identity
     *
     * @param string $NewProductId
     * @return NewProduct
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($NewProductId)
    {
        $NewProduct = $this->NewProductFactory->create();
        $NewProduct->load($NewProductId);
        if (!$NewProduct->getId()) {
            throw new NoSuchEntityException(__('The CMS NewProduct with the "%1" ID doesn\'t exist.', $NewProductId));
        }
        return $NewProduct;
    }

    /**
     * Load NewProduct data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Kmodule\Post\Api\Data\NewProductSearchResultsInterface
     */
    public function getList()
    {
        /** @var \Kmodule\Post\Model\ResourceModel\NewProduct\Collection $collection */
        $collection = $this->NewProductCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete NewProduct
     *
     * @param \Kmodule\Post\Api\Data\NewProductInterface $NewProduct
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\Kmodule\Post\Api\Data\NewProductInterface $NewProduct)
    {
        try {
            $this->resource->delete($NewProduct);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the NewProduct: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete NewProduct by given NewProduct Identity
     *
     * @param string $NewProductId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($NewProductId)
    {
        return $this->delete($this->getById($NewProductId));
    }
}