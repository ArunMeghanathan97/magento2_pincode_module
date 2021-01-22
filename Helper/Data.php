<?php
namespace Mbf\Pincodenurams\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Area;
use Magento\Framework\Mail\Template\TransportBuilder;
use \Magento\Directory\Model\Currency;
use \Magento\Directory\Model\ResourceModel\Country\CollectionFactory;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\Locale\CurrencyInterface;
use Mbf\Pincodenurams\Model\PincodenuramsFactory;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected $_transportBuilder;
    protected $_storeManager;
    protected $_countryCollectionFactory;
    protected $_modelePincodenuramsFactory;

    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;
    
    public function __construct(Context $context, TransportBuilder $transportBuilder,
								\Magento\Catalog\Model\Product $product,
                                StoreManagerInterface $storeManager, CollectionFactory $countryCollectionFactory,
                                PincodenuramsFactory $modelPincodenuramsFactory) {

		$this->product = $product;
        $this->_transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
        $this->_modelePincodenuramsFactory = $modelPincodenuramsFactory;
        $this->_countryCollectionFactory = $countryCollectionFactory;   
        parent::__construct($context);
	
    }

    
	  public function getCollection($skipBaseNotAllowed = false)
	  { 
		$pincodenuramsModel = $this->_modelePincodenuramsFactory->create()->getCollection();
		return $pincodenuramsModel;
	  }


    /**
     * Get pincode status
     */
    public function getPincodeStatus($pincode)
    {
        $collection = $this->getCollection();
        $collection->addFieldToFilter('pincode', array('eq' => $pincode));
        
        if($collection->getData()){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Get pincode status by product
     */
    public function getProductPincodeStatus($id, $pincode)
    {
        $product = $this->product->load($id);
        $pincodes = $product->getData('pincode');
        $pincodeArr = explode(',', $pincodes);

        if(in_array($pincode, $pincodeArr))
        {
            return true;
        }else{
            return false;
        }
            
    }	  
	  
}
?>