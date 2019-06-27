<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Controller\Adminhtml\Product;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Altayer\Customcatalog\Model\ResourceModel\Product;
use Altayer\Customcatalog\Model\ResourceModel\Product\CollectionFactory;
use Altayer\Customcatalog\Model\ProductFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Altayer_Customcatalog::product_list';

    /**
     * @var \Dotdigitalgroup\Email\Model\ResourceModel\Campaign\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var object
     */
    protected $messageManager;

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @var \Altayer\Customcatalog\Model\ProductFactory
     */
    private $productFactory;

    /**
     * MassDelete constructor.
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param ProductFactory $productFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        ProductFactory $productFactory
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect|\Magento\Framework\App\ResponseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        $prod = $this->productFactory->create();

        foreach ($collection as $item) {
            $prod->load($item->getId())->delete();
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
