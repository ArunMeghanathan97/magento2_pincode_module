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
    protected $_currency;
    protected $_countryCollectionFactory;
    protected $_localeCurrency;
    protected $_modelePincodenuramsFactory;
    
    public function __construct(Context $context, TransportBuilder $transportBuilder, Currency $currency,
                                StoreManagerInterface $storeManager, CollectionFactory $countryCollectionFactory,
                                CurrencyInterface $localeCurrency,PincodenuramsFactory $modelPincodenuramsFactory) {
        $this->_transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
        $this->_currency = $currency;
        $this->_localeCurrency = $localeCurrency;
        $this->_modelePincodenuramsFactory = $modelPincodenuramsFactory;
        $this->_countryCollectionFactory = $countryCollectionFactory;   
        parent::__construct($context);
    }


    public function getConfig($config_path)
	{
	    return $this->scopeConfig->getValue(
	            $config_path,
	            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
	            );
	}
  public function getOptionArray()
    {
        return [
            [
                'label' => __('------- Please choose a category -------'),
                'value' => '',
            ],
            [
                'label' => __('Categories'),
                'value' => [
                    ['value' => '1', 'label' => __('Home Banner')],
                    ['value' => '2', 'label' => __('Collections Banner')],
                    ['value' => '3', 'label' => __('Contact us Gallery')],
                ],
            ],
        ];
    }
    public function getMobileOptionArray()
    {
         return [
            [
                'label' => __('------- Please choose an option -------'),
                'value' => '',
            ],
            [
                'label' => __('Show content in mobile'),
                'value' => [
                    ['value' => '1', 'label' => __('Yes')],
                    ['value' => '2', 'label' => __('No')],
                ],
            ],
        ];
    }
  public function getAvailableCurrencyCodes($skipBaseNotAllowed = false)
  {
    return $this->_storeManager->getStore()->getAvailableCurrencyCodes($skipBaseNotAllowed);
  }

  public function getCurrentCurrencySymbol()
{
  $code = $this->_storeManager->getStore()->getCurrentCurrencyCode();
  return $this->_localeCurrency->getCurrency($code)->getSymbol();
}
  public function getCountryCollection()
  {
     return $this->_countryCollectionFactory->create()->loadByStore();
  }

	public function getShortcode($html)
	{

       $array = array (
           '<p>[' => '[', 
           ']</p>' => ']', 
           ']<br />' => ']',
           '<p></p>' => ''
       );
       $html = strtr($html, $array);
       
       /*title starts here*/
       if (preg_match("/\[span\]/",$html,$matches)) {
          
       $title = preg_replace("/\[span\]/", '<span>', $html);
       $html = preg_replace("/\[\/span\]/", '</span>', $title);
       }
       if (preg_match("/\[garment_image\]/",$html,$matches)) {
          
       $title = preg_replace("/\[garment_image\]/", '<div class="spirt-img garment-img">', $html);
       $html = preg_replace("/\[\/garment_image\]/", '</div>', $title);
       }
       if (preg_match("/\[furnish_image\]/",$html,$matches)) {
          
       $title = preg_replace("/\[furnish_image\]/", '<div class="spirt-img furnish-img">', $html);
       $html = preg_replace("/\[\/furnish_image\]/", '</div>', $title);
       }
       if (preg_match("/\[craft_image\]/",$html,$matches)) {
          
       $title = preg_replace("/\[craft_image\]/", '<div class="spirt-img craft-img">', $html);
       $html = preg_replace("/\[\/craft_image\]/", '</div>', $title);
       }
       if (preg_match("/\[logo\]/",$html,$matches)) {
          
       $title = preg_replace("/\[logo\]/", '<div class="logo">', $html);
       $html = preg_replace("/\[\/logo\]/", '</div>', $title);
       }
       if (preg_match("/\[banner\]/",$html,$matches)) {
          
       $title = preg_replace("/\[banner\]/", '<div class="customhomebanner">', $html);
       $html = preg_replace("/\[\/banner\]/", '</div>', $title);
       }
       if (preg_match("/\[categorybanner\]/",$html,$matches)) {
          
       $title = preg_replace("/\[categorybanner\]/", '', $html);
       $html = preg_replace("/\[\/categorybanner\]/", '', $title);
       }
       if (preg_match("/\[charttable\]/",$html,$matches)) {
          
       $title = preg_replace("/\[charttable\]/", '<div class="size-table"><div class="size-cart-table">', $html);
       $html = preg_replace("/\[\/charttable\]/", '</div></div>', $title);
       }

       if (preg_match("/\[intro_content\]/",$html,$matches)) {
          
       $title = preg_replace("/\[intro_content\]/", '<div class="intro-desc">', $html);
       $html = preg_replace("/\[\/intro_content\]/", '</div>', $title);
       }

       if (preg_match("/\[center_content\]/",$html,$matches)) {
          
       $title = preg_replace("/\[center_content\]/", '<div class="col-xs-8 middle-content">', $html);
       $html = preg_replace("/\[\/center_content\]/", '</div>', $title);
       }

       if (preg_match("/\[accordion\]/",$html,$matches)) {
          
       $title = preg_replace("/\[accordion\]/", '<div class="accordion accordion-comm">', $html);
       $html = preg_replace("/\[\/accordion\]/", '</div>', $title);
       }

       if (preg_match("/\[accordion_content\]/",$html,$matches)) {
          
       $title = preg_replace("/\[accordion_content\]/", '<div>', $html);
       $html = preg_replace("/\[\/accordion_content\]/", '</div>', $title);
       }

       if (preg_match("/\[image_gallery\]/",$html,$matches)) {
          
       $title = preg_replace("/\[image_gallery\]/", '<div class="pull-image">', $html);
       $html = preg_replace("/\[\/image_gallery\]/", '</div>', $title);
       $html = preg_replace( '/(width|height)=("|\')\d*(|px)("|\')\s/', "", $html );

       }

       if (preg_match("/\[image_gallery_caption\]/",$html,$matches)) {
          
       $title = preg_replace("/\[image_gallery_caption\]/", '<div class="pull-image-content">', $html);
       $html = preg_replace("/\[\/image_gallery_caption\]/", '</div>', $title);
       }

       if (preg_match("/\[offer_box\]/",$html,$matches)) {
          
       $title = preg_replace("/\[offer_box\]/", '<div class="whitebox-content"><div>', $html);
       $html = preg_replace("/\[\/offer_box\]/", '</div></div>', $title);
       }

       $html = str_replace("<p></p>","",$html); /*replaces the empty para tags*/
     return $html; 
  }
  public function getCollection($skipBaseNotAllowed = false)
  { 
    $featuredproductModel = $this->_modelePincodenuramsFactory->create()->getCollection();
    return $featuredproductModel;
  }
}
?>