<?php
 
namespace Mbf\Pincodenurams\Block\Adminhtml\Pincodenurams\Edit;
 
use Magento\Backend\Block\Widget\Tabs as WidgetTabs;
 
class Tabs extends WidgetTabs
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('pincodenurams_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Category Item Information'));
    }
 
    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'news_info',
            [
                'label' => __('General'),
                'title' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'Mbf\Pincodenurams\Block\Adminhtml\Pincodenurams\Edit\Tab\Info'
                )->toHtml(),
                'active' => true
            ]
        );
 
        return parent::_beforeToHtml();
    }
}