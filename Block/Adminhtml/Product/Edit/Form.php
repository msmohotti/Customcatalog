<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */
namespace Altayer\Customcatalog\Block\Adminhtml\Product\Edit;

/**
 * Class Form
 * @package Altayer\Customcatalog\Block\Adminhtml\Product\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('altcat_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'product_id',
            'text',
            [
                'name' => 'product_id',
                'label' => __('Product ID'),
                'id' => 'title',
                'title' => __('Title'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'copy_write_info',
            'editor',
            [
                'name' => 'copy_write_info',
                'label' => __('Copy Write Info'),
                'style' => 'height:15em;',
                'required' => true
            ]
        );

        $fieldset->addField(
            'vpn',
            'text',
            [
                'name' => 'vpn',
                'label' => __('Vendor Product Number'),
                'id' => 'title',
                'title' => __('Vendor Product Number'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'sku',
            'text',
            [
                'name' => 'sku',
                'label' => __('SKU'),
                'id' => 'title',
                'title' => __('SKU'),
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
