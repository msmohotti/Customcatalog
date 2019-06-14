<?php

namespace Altayer\Customcatalog\Model\ResourceModel\Product;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'altayer_customcatalog_collection';
    protected $_eventObject = 'customcatalog_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Altayer\Customcatalog\Model\Product',
            'Altayer\Customcatalog\Model\ResourceModel\Product');
    }

}
