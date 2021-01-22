<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
use Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
class Save extends Pincodenurams
{
   /**
     * @return void
     */
   public function execute()
   {
      $isPost = $this->getRequest()->getPost();
 
      if ($isPost) {
         $pincodenuramsModel = $this->_pincodenuramsFactory->create();
         $pincodenuramsId = $this->getRequest()->getParam('id');
 
         if ($pincodenuramsId) {
            $pincodenuramsModel->load($pincodenuramsId);
         }
         $formData = $this->getRequest()->getParam('pincodenurams');
         $pincodenuramsModel->setData($formData);
         
         try {
            // Save news
            $pincodenuramsModel->save();
 
            // Display success message
            $this->messageManager->addSuccess(__('The pincode has been saved.'));
 
            // Check if 'Save and Continue'
            if ($this->getRequest()->getParam('back')) {
               $this->_redirect('*/*/edit', ['id' => $pincodenuramsModel->getId(), '_current' => true]);
               return;
            }
 
            // Go to grid page
            $this->_redirect('*/*/');
            return;
         } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
         }
 
         $this->_getSession()->setFormData($formData);
         $this->_redirect('*/*/edit', ['id' => $pincodenuramsId]);
      }
   }
}