<?php
namespace AHT\Blog\Controller\Index;

use AHT\AddPassword\Controller\Adminhtml\Customer;
use Exception;

class Cussave extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_customerFactory;

	protected $_customerRepository;

	protected $_coreRegistry;

	protected $resultRedirect;

    protected $urlInterface;
    
    private $_cacheTypeList;
    
    private $_cacheFrontendPool;
    private $_encryptor;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\CustomerFactory $customerFactory,
		\Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository, 
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Framework\Controller\ResultFactory $result, 
		\Magento\Framework\App\Cache\TypeListInterface $cacheTypeList, 
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        \Magento\Framework\Encryption\EncryptorInterface $encryptorInterface
        
		)
	{   
		$this->_pageFactory = $pageFactory;
		$this->_customerFactory = $customerFactory;
		$this->_customerRepository = $customerRepository;
		$this->_coreRegistry = $coreRegistry;
		$this->resultRedirect = $result;
		$this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->_encryptor= $encryptorInterface;

        return parent::__construct($context);
	}

	public function execute()
	{
		
		if (isset($_POST['editbtn'])) {
            // $customer = $this->_customerRegistry->retrieve($_POST['editbtn']); //TODO: có nhiều cách để lấy ra một đối tượng
		    $customer = $this->_customerRepository->getById($_POST['editbtn']);
			
            $pass = $_POST['password'];
            $this->_customerRepository->save($customer,$this->_encryptor->getHash($pass,true));
            $customer= $this->_customerFactory->create()->load($_POST['editbtn']);
            // echo ($pass);
            // exit;
            $customer->setEmail($_POST['email']);
            $customer->setName($_POST['name']);

            $customer->save();
		}
		elseif (isset($_POST['createbtn'])) {
            $customer = $this->_customerFactory->create()->load($_POST['createbtn']);
			$customer->setName($_POST['name']);
			$customer->setUrlKey($_POST['url']);
			$customer->setContent($_POST['content']);
			$customer->setStatus($_POST['status']);
			$customer->setCreatedAt(date('Y-m-d H:i:s'));
			$customer->setUpdatedAt(date('Y-m-d H:i:s'));
        }
            
        

        
         $types = array('config','layout','block_html','collections','reflection','db_ddl','compiled_config','eav','config_integration','config_integration_api','full_page','translate','config_webservice','vertex');
		foreach ($types as $type) {
		    $this->_cacheTypeList->cleanType($type);
		}
		foreach ($this->_cacheFrontendPool as $cacheFrontend) {
		    $cacheFrontend->getBackend()->clean();
		}

		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('blog/index/cusindex');
		return $resultRedirect; 
	}
}