<?php
 
namespace Mbf\Pincodenurams\Model;
 
use \Magento\Framework\Model\AbstractModel;
 
class Pincodenurams extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Mbf\Pincodenurams\Model\Resource\Pincodenurams');
    }
}