<?php
namespace KienAHT\Poll\Controller\Adminhtml\Index;

use KienAHT\Poll\Model\Question as Question;


class Delete extends \Magento\Backend\App\Action
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
        $id = $this->getRequest()->getParam('id');

        $question = $this->questionFactory->create()->load($id);

        if(!$question)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $question->delete();
            $this->messageManager->addSuccess(__('Your question has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete question'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}