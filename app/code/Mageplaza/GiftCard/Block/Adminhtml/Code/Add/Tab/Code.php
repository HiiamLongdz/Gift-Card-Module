<?php


namespace Mageplaza\GiftCard\Block\Adminhtml\Code\Add\Tab;

use Magento\Framework\App\Helper\AbstractHelper;
use Mageplaza\GiftCard\Helper\Data;

class Code extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_helperData;

    public function __construct(\Magento\Backend\Block\Template\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Data\FormFactory $formFactory,
                                array $data = [], Data $helperData)
    {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->_helperData = $helperData;
    }

    /**
     * @inheritDoc
     */
    public function getTabLabel()
    {
        // TODO: Implement getTabLabel() method.
        return __('Gift card information');
    }

    /**
     * @inheritDoc
     */
    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return $this->getTabLabel();
    }

    /**
     * @inheritDoc
     */
    public function canShowTab()
    {
        // TODO: Implement canShowTab() method.
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isHidden()
    {
        // TODO: Implement isHidden() method.
        return false;
    }

    protected function _prepareForm()
    {

        $codeLength = $this->_helperData->getCodeConfig('code_length');

        $form = $this->_formFactory->create();
        $formField = $form->addFieldset('base_fieldset', ['legend' => __('Gift Card Information')]);

        $formField->addField(
            'code_length',
            'text',
            [
                'name' => 'code_length',
                'required' => true,
                'label' => __('Code Length'),
                'title' => __('Code Length'),
                'value' => $codeLength
            ]
        );

        $formField->addField(
            'balance',
            'text',
            [
                'name' => 'balance',
                'required' => true,
                'label' => __('Balance'),
                'title' => __('Balance'),
                'class' => 'validate-number validate-greater-than-zero'
            ]
        );

        $this->setForm($form);
        return parent::_prepareForm(); // TODO: Change the autogenerated stub
    }
}
