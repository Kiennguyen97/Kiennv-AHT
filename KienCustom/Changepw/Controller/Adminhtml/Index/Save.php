<?php
namespace KienCustom\Changepw\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    // const ADMIN_RESOURCE = 'Index';
    protected $resultPageFactory;
    protected $customerRepository;
    protected $encryptor;
    protected $resultRedirect;
    protected $customerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\Controller\ResultFactory $result
    )
    {
        $this->customerFactory = $customerFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirect = $result;
        $this->encryptor = $encryptor;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->resultRedirect = $this->resultRedirectFactory->create();
		
        $data = $this->getRequest()->getPostValue();
        $id = $data['entity_id'];  //TODO: lấy data trong primaryFieldName 
        if($id){
            $this->resultRedirect->setPath('customer/*/');
            $password = $data['password'];
            $customer = $this->customerFactory->create();
            $customer = $customer->load($id);
            $customer = $customer->changePassword($password);
            $customer->save();
        }else{
            $this->resultRedirect->setPath('*/*/listcus');
            $customer = $this->customerFactory->create();
            $customer->setData($data);
            $customer->save();
        }
        return $this->resultRedirect;
    }
}
