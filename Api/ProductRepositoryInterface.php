<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Api;

interface ProductRepositoryInterface
{
    /**
     * Returns product date to user
     *
     * @param string $vpn
     * @return string Greeting message with users name.
     * @api
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
}