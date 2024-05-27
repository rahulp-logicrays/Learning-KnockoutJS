<?php
namespace Logicrays\DynamicList\Model\ResourceModel\DynamicItem;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'logicrays_dynamiclist_dynamic_item_collection';
    protected $_eventObject = 'dynamic_item_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Logicrays\DynamicList\Model\DynamicItem::class,
            \Logicrays\DynamicList\Model\ResourceModel\DynamicItem::class
        );
    }
}
