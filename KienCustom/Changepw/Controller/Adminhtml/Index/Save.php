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
		$this->resultRedirect->setPath('customer/*/');
        $data = $this->getRequest()->getPostValue();
        $id = $data['entity_id'];  //TODO: lấy data trong primaryFieldName 
        $password = $data['password'];
        $customer = $this->customerFactory->create();
        $customer = $customer->load($id);
        $customer = $customer->changePassword($password); //TODO: hàm changePassword (String) có trong model/Customer
        $customer->save();
        return $this->resultRedirect;
    }
}
