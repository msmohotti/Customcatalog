<?php
namespace Altayer\Customcatalog\Api;

interface ProductRepositoryInterface
{
    /**
     * Returns product date to user
     *
     * @api
     * @param string $vpn
     * @return string Greeting message with users name.
     */
    public function getByVpn($vpn);

    /**
     * Saves Product
     *
     * @param \Altayer\Customcatalog\Api\Data\ProductInterface $product
     * @return \Altayer\Customcatalog\Api\Data\ProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Altayer\Customcatalog\Api\Data\ProductInterface $product);


//    public function save($entity_id, $product_id);
}