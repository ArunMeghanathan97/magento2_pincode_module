<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
use Mbf\Pincodenurams\Controller\Adminhtml\Pincodenurams;
 
class NewAction extends Pincodenurams
{
   /**
     * Create new pincodenurams action
     *
     * @return void
     */
   public function execute()
   {
      $this->_forward('edit');
   }
}
 