<?php
namespace KienAHT\Newp\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $newproFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \KienAHT\Newp\Model\NewproFactory $newproFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->newproFactory = $newproFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            try{
                $id = $data['newpro_id'];

                $newpro = $this->newproFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $newpro->setData($data);
                $newpro->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $newpro->getId()]);
            }
        }

         return $resultRedirect->setPath('*/*/');
    }
}