<?php 
// TODO: trước đó là của phần tạo module hiển thị fontend chưa có data
// namespace AHT\Blog\Block;
// class Index extends \Magento\Framework\View\Element\Template{
//     public function __construct(\Magento\Framework\View\Element\Template\Context $context)
//     {
//         parent::__construct($context);
//     }
//     public function getBlogInfo(){
//         return __('AHT Blog module');
        
//     }
//     public function getPosts(){
//         $post = $this->_postFactory->create();
//         $collection = $post->getCollection();
//     return $collection;
//     }
// }?>
<?php
namespace AHT\Blog\Block;
class Index extends \Magento\Framework\View\Element\Template
{	
	//TODO: phần ban đầu post khởi tạo
	// private $postFactory;
	// private $postRepository;
    // public function __construct(\Magento\Framework\View\Element\Template\Context $context, 
    // \AHT\Blog\Model\PostRepository $postRepository,
    // \AHT\Blog\Model\PostFactory $postFactory)
	// {
	// 	parent::__construct($context);
	// 	$this->postFactory = $postFactory;
	// 	$this->postRepository = $postRepository;
	// }

	// public function getBlogInfo()
	// {
	// 	return __('AHT Blog module');
	// }
	// public function getPosts()
	// {
	// 	$collection = $this->postRepository->getList();
	// 	// $collection = $post->getCollection();
	// 	return $collection;
	// }

	//TODO: phần lấy product
	protected $_productCollectionFactory;
	protected const PAGESIZE = 5;
        
    public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
		\Magento\Catalog\Helper\ImageFactory $imageFactory
		// \Magento\Catalog\Model\ProductRepository $productRepository,       
    )
    {   
		// $this->_productRepository = $productRepository;
		$this->_imageFactory= $imageFactory;
        $this->_productCollectionFactory = $productCollectionFactory;    
        parent::__construct($context);
    }
    public function getImage_url($post){
		$imageHelper = $this->_imageFactory->create();
		$image_url = $imageHelper->init($post, 'product_thumbnail_image')->setImageFile($post->getFile())->resize(50, 50)->getUrl();
		return $image_url;
	}
    public function getPosts(int $num = self::PAGESIZE)
    {	
		// $collection = $this->_productRepository->getList();
        $collection = $this->_productCollectionFactory->create(); //tạo object productcollection
        $collection->addAttributeToSelect('*');
		$collection->setPageSize($num); // fetching only 5 products lấy 5 cái đầu tiên
		// $collection->getSelect()->orderRand()->limit(5); TODO: random 5 cái
        return $collection;
    }

}