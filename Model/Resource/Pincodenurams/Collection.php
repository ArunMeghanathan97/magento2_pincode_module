<?php
 
namespace Mbf\Pincodenurams\Model\Resource\Pincodenurams;
 
use Magento\Framework\Model\Resource\Db\Collection\AbstractCollection;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Mbf\Pincodenurams\Model\Pincodenurams',
            'Mbf\Pincodenurams\Model\Resource\Pincodenurams'
        );
    }
}