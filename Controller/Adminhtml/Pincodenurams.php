<?php
 
namespace Mbf\Pincodenurams\Controller\Adminhtml;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mbf\Pincodenurams\Model\PincodenuramsFactory;
 
class Pincodenurams extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
 
    /**
     * Result page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
 
    /**
     * News model factory
     *
     * @var \Mbf\Featuredproducts\Model\PincodenuramsFactory
     */
    protected $_pincodenuramsFactory;
 
    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param NewsFactory $pincodenuramsFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        PincodenuramsFactory $pincodenuramsFactory
    ) {
       parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_pincodenuramsFactory = $pincodenuramsFactory;
    }
 
    /**
     * News access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mbf_Pincodenurams::manage_pincodenurams');
    }
    public function execute()
{
    /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
    $resultPage = $this->_resultPageFactory->create();

    return $resultPage;
}
}