<?php
namespace KienAHT\Poll\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'KienAHT_Poll::listquestion';

    protected $resultPageFactory;
    protected $questionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \KienAHT\Poll\Model\QuestionFactory $questionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->questionFactory = $questionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            try{
                $id = $data['question_id'];

                $question = $this->questionFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $question->setData($data);
                $question->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $question->getId()]);
            }
        }

         return $resultRedirect->setPath('*/*/');
    }
}