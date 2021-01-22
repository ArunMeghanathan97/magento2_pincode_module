<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
use Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
class Delete extends Pincodenurams
{
   /**
    * @return void
    */
   public function execute()
   {
      $pincodenuramsId = (int) $this->getRequest()->getParam('id');
 
      if ($pincodenuramsId) {
         /** @var $pincodenuramsModel \Mageworld\Pincodenurams\Model\Pincodenurams */
         $pincodenuramsModel = $this->_pincodenuramsFactory->create();
         $pincodenuramsModel->load($pincodenuramsId);
 
         // Check this featuredproduct exists or not
         if (!$pincodenuramsModel->getId()) {
            $this->messageManager->addError(__('This pincode no longer exists.'));
         } else {
               try {
                  // Delete Pincodenurams
                  $pincodenuramsModel->delete();
                  $this->messageManager->addSuccess(__('The pincode has been deleted.'));
 
                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['id' => $pincodenuramsModel->getId()]);
               }
            }
      }
   }
}