<?php
namespace Logicrays\DynamicList\Model\ResourceModel;

class DynamicItem extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('logicrays_dynamic_list', 'entity_id');
    }
}
