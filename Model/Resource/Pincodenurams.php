<?php
 
namespace Mbf\Pincodenurams\Model\Resource;
 
use \Magento\Framework\Model\Resource\Db\AbstractDb;
 
class Pincodenurams extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('nurams_pincode', 'id');
    }
}