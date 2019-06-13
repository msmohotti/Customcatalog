<?php
namespace Altayer\Customcatalog\Model;
class Customcatalog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'altayer_customcatalog';

    protected $_cacheTag = 'altayer_customcatalog';

    protected $_eventPrefix = 'altayer_customcatalog';

    protected function _construct()
    {
        $this->_init('Altayer\Customcatalog\Model\ResourceModel\Customcatalog');
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
}