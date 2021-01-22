<?php
 
namespace Mbf\Pincodenurams\Block\Adminhtml\Pincodenurams\Edit\Tab;
 
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Mbf\Pincodenurams\Model\System\Config\Status;
 
class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;
 
    /**
     * @var \Mbf\Pincodenurams\Model\Config\Status
     */
    //protected $_newsStatus;
 
   /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param Status $newsStatus
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        //Status $newsStatus,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        //$this->_newsStatus = $newsStatus;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
       /** @var $model \Mbf\Featuredproducts\Model\Featuredproduct */
        $model = $this->_coreRegistry->registry('pincodenurams_pincodenurams');
        $dataHelper = \Magento\Framework\App\ObjectManager::getInstance()->get("\Mbf\Pincodenurams\Helper\Data");
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('pincodenurams_');
        $form->setFieldNameSuffix('pincodenurams');
 
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );
 
        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'pincode',
            'text',
            [
                'name'        => 'pincode',
                'label'    => __('Pincode'),
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
 
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Pincode Info');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Pincode Info');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}