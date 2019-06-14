<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Model;

use Altayer\Customcatalog\Model\Product\Publisher;
use Altayer\Customcatalog\Model\ResourceModel\Product as ProductResource;
use Altayer\Customcatalog\Logger\Logger;

class ProcessQueueMsg
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    private $resource;
    private $publisher;
    private $productFactory;

    /**
     * ProcessQueueMsg constructor.
     * @param ProductResource $resource
     * @param Publisher $publisher
     * @param Logger $logger
     * @param Product $productFactory
     */
    public function __construct(
        ProductResource $resource,
        Publisher $publisher,
        Logger $logger,
        Product $productFactory
    )
    {
        $this->resource = $resource;
        $this->publisher = $publisher;
        $this->logger = $logger;
        $this->productFactory = $productFactory;
    }

    public function process($message)
    {
        $product = json_decode($message);

        try {
            $this->resource->save($product);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the product: %1', $exception->getMessage()),
                $exception
            );
        }
    }
}