<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Altayer\Customcatalog\Api\Data;

/**
 * CMS page interface.
 * @api
 * @since 100.0.2
 */
interface ProductInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const PRODUCT_ID = 'product_id';
    const COPY_WRITE_INFO = 'copy_write_info';
    const VPN = 'vpn';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Get ProductId.
     *
     * @return string|null
     */
    public function getProductId();

    /**
     * Set ProductId.
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Get Copy Write Info.
     *
     * @return string|null
     */
    public function getCopyWriteInfo();

    /**
     * Set Copy Write Info.
     * @return $this
     */
    public function setCopyWriteInfo($copyWriteInfo);

    /**
     * Get VPN.
     * @return string|null
     */
    public function getVpn();

    /**
     * Set VPN.
     * @return $this
     */
    public function setVpn($vpn);


}