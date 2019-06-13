<?php

namespace Altayer\Customcatalog\Model;

use Altayer\Customcatalog\Api\ProductInterface;
use Altayer\Customcatalog\Model\Product\Publisher;

/**
 * Class Product
 * @package Altayer\Customcatalog\Model
 */
class Product implements ProductInterface
{
    /**
     * @var Publisher
     */
    private $publisher;

    private $postFactory;

    /**
     * Product constructor.
     * @param Publisher $publisher
     */
    public function __construct(
        Publisher $publisher,
        \Altayer\Customcatalog\Model\CustomcatalogFactory $postFactory
    )
    {
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
}