<?php

namespace Arsenchik\Review\Block\Adminhtml\Reviews;
/**
 * Class Form
 * @package Arsenchik\Review\Block\Adminhtml\Reviews
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var
     */
    protected $_systemStore;


    /**
     * Form constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Form
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(['data' => ['id' => 'edit_form', 'enctype' => 'multipart/form-data', 'action' => $this->getData('action'), 'method' => 'post']]);
        $form->setHtmlIdPrefix('arseniyrev_');
        if ($model) {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Notes Details'), 'class' => 'fieldset-wide']);
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Notes Details'), 'class' => 'fieldset-wide']);
        }
        $fieldset->addField(
            'review',
            'text',
            [
                'name' => 'review',
                'label' => __('Review'),
                'title' => __('Review'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $form->setValues($model ? $model->getData() : '');
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
