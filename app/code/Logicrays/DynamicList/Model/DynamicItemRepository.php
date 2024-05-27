<?php
namespace Logicrays\DynamicList\Model;

use Logicrays\DynamicList\Api\DynamicItemRepositoryInterface;
use Logicrays\DynamicList\Api\Data\DynamicItemInterface;
use Logicrays\DynamicList\Model\ResourceModel\DynamicItem as DynamicItemResource;
use Logicrays\DynamicList\Model\DynamicItemFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class DynamicItemRepository implements DynamicItemRepositoryInterface
{
    protected $resource;

    protected $dynamicItemFactory;

    public function __construct(
        DynamicItemResource $resource,
        DynamicItemFactory $dynamicItemFactory
    ) {
        $this->resource = $resource;
        $this->dynamicItemFactory = $dynamicItemFactory;
    }

    public function save(DynamicItemInterface $item)
    {
        $this->resource->save($item);
        return $item;
    }

    public function getById($id)
    {
        $item = $this->dynamicItemFactory->create();
        $this->resource->load($item, $id);
        if (!$item->getId()) {
            throw new NoSuchEntityException(__('Dynamic Item with id "%1" does not exist.', $id));
        }
        return $item;
    }

    public function delete(DynamicItemInterface $item)
    {
        $this->resource->delete($item);
        return true;
    }

    public function deleteById($id)
    {
        $item = $this->getById($id);
        $this->delete($item);
        return true;
    }
}
