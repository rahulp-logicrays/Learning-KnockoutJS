<?php
namespace Logicrays\DynamicList\Api;

use Logicrays\DynamicList\Api\Data\DynamicItemInterface;

interface DynamicItemRepositoryInterface
{
    /**
     * Save the records
     *
     * @param DynamicItemInterface $item
     * @return DynamicItemInterface
     */
    public function save(DynamicItemInterface $item);

    /**
     * Get whole records by id
     *
     * @param int $id
     * @return DynamicItemInterface
     */
    public function getById($id);

    /**
     * Delete records
     *
     * @param DynamicItemInterface $item
     * @return bool Will returned True if deleted
     */
    public function delete(DynamicItemInterface $item);

    /**
     * Delete records by id
     *
     * @param int $id
     * @return bool Will returned True if deleted
     */
    public function deleteById($id);
}
