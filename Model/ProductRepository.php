<?php

namespace Altayer\Customcatalog\Model;

use Altayer\Customcatalog\Api\ProductRepositoryInterface;
use Altayer\Customcatalog\Model\Product\Publisher;
use Altayer\Customcatalog\Model\ResourceModel\Customcatalog as ResourceCustomcatalog;

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

    /**
     * Product constructor.
     * @param Publisher $publisher
     */
    public function __construct(
        ResourceCustomcatalog $resource,
        Publisher $publisher,
        \Altayer\Customcatalog\Model\CustomcatalogFactory $postFactory
    )
    {
        $this->resource = $resource;
        $this->publisher = $publisher;
        $this->_postFactory = $postFactory;
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
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        $collection->addFieldToFilter('vpn', array('eq' => $vpn));
        $results = [];
        foreach($collection as $item){
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
        try {
            $this->resource->save($product);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the page: %1', $exception->getMessage()),
                $exception
            );
        }
        return $product;
    }
}