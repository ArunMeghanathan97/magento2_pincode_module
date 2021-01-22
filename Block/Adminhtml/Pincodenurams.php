<?php
 
namespace Mbf\Pincodenurams\Block\Adminhtml;
 
use Magento\Backend\Block\Widget\Grid\Container;
 
class Pincodenurams extends \Magento\Backend\Block\Widget\Grid\Container
{
   /**
     * Constructor
     *
     * @return void
     */
   protected function _construct()
    {
        $this->_controller = 'adminhtml_pincodenurams';
        $this->_blockGroup = 'Mbf_Pincodenurams';
        $this->_headerText = __('Manage all Items');
        $this->_addButtonLabel = __('Add a Item');
        parent::_construct();
    }
}