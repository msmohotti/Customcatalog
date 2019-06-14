<?php
namespace Altayer\Customcatalog\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Altayer\Customcatalog\Api\Data\ProductInterface;

class Product extends AbstractModel implements IdentityInterface, ProductInterface
{
    const CACHE_TAG = 'altayer_customcatalog';

    protected $_cacheTag = 'altayer_customcatalog';

    protected $_eventPrefix = 'altayer_customcatalog';

    protected function _construct()
    {
        $this->_init('Altayer\Customcatalog\Model\ResourceModel\Product');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    /**
     *
     * Set EntityId.
     * @return $this
     */
    public function setEntityId($entityId){
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Set ProductId.
     * @return $this
     */
    public function setProductId($productId){
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Set Copy Write Info.
     * @return $this
     */
    public function setCopyWriteInfo($copyWriteInfo){
        return $this->setData(self::COPY_WRITE_INFO, $copyWriteInfo);
    }

    /**
     * Set VPN.
     * @return $this
     */
    public function setVpn($vpn){
        return $this->setData(self::VPN, $vpn);
    }

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId(){
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Get ProductId.
     *
     * @return string|null
     */
    public function getProductId(){
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Get Copy Write Info.
     *
     * @return string|null
     */
    public function getCopyWriteInfo(){
        return $this->getData(self::COPY_WRITE_INFO);
    }

    /**
     * Get VPN.
     *
     * @return string|null
     */
    public function getVpn(){
        return $this->getData(self::VPN);
    }

}