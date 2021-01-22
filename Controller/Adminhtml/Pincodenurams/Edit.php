<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
use Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
class Edit extends Pincodenurams
{
   /**
     * @return void
     */
   public function execute()
   {
      $pincodenuramsId = $this->getRequest()->getParam('id');
        /** @var \Mbf\Pincodenurams\Model\Pincodenurams $model */
        $model = $this->_pincodenuramsFactory->create();
 
        if ($pincodenuramsId) {
            $model->load($pincodenuramsId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This pincode no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
 
        // Restore previously entered form data from session
        $data = $this->_session->getPincodenuramsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('pincodenurams_pincodenurams', $model);
 
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Mbf_Pincodenurams::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Banner Items'));
 
        return $resultPage;
   }
}