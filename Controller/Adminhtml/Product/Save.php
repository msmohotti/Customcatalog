<?php

/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  Webkul
 * @package   Webkul_Grid
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Altayer\Customcatalog\Controller\Adminhtml\Product;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Altayer\Customcatalog\Model\CustomcatalogFactory
     */
    var $customcatalogFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Altayer\Customcatalog\Model\CustomcatalogFactory $customcatalogFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Altayer\Customcatalog\Model\CustomcatalogFactory $customcatalogFactory
    ) {
        parent::__construct($context);
        $this->customcatalogFactory = $customcatalogFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->_redirect('customcatalog/product/add');
            return;
        }
        try {
            $rowData = $this->customcatalogFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('customcatalog/product/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Altayer_Customcatalog::save');
    }
}
