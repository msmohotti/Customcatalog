<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Model;

use Altayer\Customcatalog\Api\ProductRepositoryInterface;
use Altayer\Customcatalog\Model\Product\Publisher;
use Altayer\Customcatalog\Model\ResourceModel\Product as ProductResource;
use Altayer\Customcatalog\Model\ProductFactory;
use Altayer\Customcatalog\Logger\Logger;


/**
 * Class Product
 * @package Altayer\Customcatalog\Model
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var ResourcePage
     */
    protected $resource;
    /**
     * @var Publisher
     */
    private $publisher;

    private $productFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ProductRepository constructor.
     * @param ProductResource $resource
     * @param Publisher $publisher
     * @param Product $productFactory
     * @param Logger $logger
     */
    public function __construct(
        ProductResource $resource,
        Publisher $publisher,
        ProductFactory $productFactory,
        Logger $logger
    )
    {
        $this->resource = $resource;
        $this->publisher = $publisher;
        $this->productFactory = $productFactory;
        $this->logger = $logger;
    }

    /**
     * Returns greeting message to user
     *
     * @param string $name Users name.
     * @return string Greeting message with users name.
     * @api
     */
    public function getByVpn($vpn)
    {
        $product = $this->productFactory->create();
        $collection = $product->getCollection();
        $collection->addFieldToFilter('vpn', array('eq' => $vpn));
        $results = [];
        foreach ($collection as $item) {
            $results[] = $item->getData();
        }

        return $results;
    }

    /**
     * Save Page data
     *
     * @param \Altayer\Customcatalog\Api\Data\ProductInterface $product
     * @return $product
     * @throws CouldNotSaveException
     */
    public function save(\Altayer\Customcatalog\Api\Data\ProductInterface $product)
    {
        $this->publisher->publish(json_encode($product->getData(), JSON_UNESCAPED_SLASHES));
        return $product;
    }
}