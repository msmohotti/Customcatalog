<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Controller\Adminhtml\Product;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Altayer\Customcatalog\Model\ProductFactory
     */
    var $productFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Altayer\Customcatalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Altayer\Customcatalog\Model\ProductFactory $productFactory
    )
    {
        parent::__construct($context);
        $this->productFactory = $productFactory;
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
            $rowData = $this->productFactory->create();
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
