<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
use Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
class MassDelete extends Pincodenurams
{
   /**
    * @return void
    */
   public function execute()
   {
      // Get IDs of the selected featuredproduct
      $pincodenuramsIds = $this->getRequest()->getParam('pincode');
 
        foreach ($pincodenuramsIds as $pincodenuramsId) {
            try {
               /** @var $pincodenuramsModel \Mbf\Featuredproducts\Model\Featuredproduct */
                $pincodenuramsModel = $this->_pincodenuramsFactory->create();
                $pincodenuramsModel->load($pincodenuramsId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
 
        if (count($pincodenuramsIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($pincodenuramsIds))
            );
        }
 
        $this->_redirect('*/*/index');
   }
}