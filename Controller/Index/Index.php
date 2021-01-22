<?php
 
namespace Mbf\Pincodenurams\Controller\Index;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Mbf\Pincodenurams\Model\PincodenuramsFactory;
 
class Index extends Action
{
    /**
     * @var \Tutorial\Featuredproducts\Model\PincodenuramsFactory
     */
    protected $_modelPincodenuramsFactory;
 
    /**
     * @param Context $context
     * @param PincodenuramsFactory $modelPincodenuramsFactory
     */
    public function __construct(
        Context $context,
        PincodenuramsFactory $modelFeaturedproductFactory
    ) {
        parent::__construct($context);
        $this->_modelPincodenuramsFactory = $modelFeaturedproductFactory;
    }
 
    public function execute()
    {
        /**
         * When Magento get your model, it will generate a Factory class
         * for your model at var/generaton folder and we can get your
         * model by this way
         */
        $newsModel = $this->_modelPincodenuramsFactory->create();
 
        // Load the item with ID is 1
        $item = $newsModel->load(1);
        var_dump($item->getData());
 
        // Get news collection
        $newsCollection = $newsModel->getCollection();
        // Load all data of collection
        var_dump($newsCollection->getData());
    }
}