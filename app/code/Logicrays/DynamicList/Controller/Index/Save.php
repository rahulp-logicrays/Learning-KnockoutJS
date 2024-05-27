<?php
namespace Logicrays\DynamicList\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Logicrays\DynamicList\Api\DynamicItemRepositoryInterface;
use Logicrays\DynamicList\Model\DynamicItemFactory;

class Save extends Action
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var DynamicItemRepositoryInterface
     */
    protected $dynamicItemRepository;

    /**
     * @var DynamicItemFactory
     */
    protected $dynamicItemFactory;

    /**
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param DynamicItemRepositoryInterface $dynamicItemRepository
     * @param DynamicItemFactory $dynamicItemFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        DynamicItemRepositoryInterface $dynamicItemRepository,
        DynamicItemFactory $dynamicItemFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->dynamicItemRepository = $dynamicItemRepository;
        $this->dynamicItemFactory = $dynamicItemFactory;
        parent::__construct($context);
    }

    /**
     * Saved records into databases;
     *
     * @return void
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $data = $this->getRequest()->getContent();
        $data = json_decode($data, true);

        if ($data) {
            try {
                foreach ($data as $itemData) {
                    $item = $this->dynamicItemFactory->create();
                    $item->setName($itemData['name']);
                    $item->setEmail($itemData['email']);
                    $item->setDob($itemData['dob']);
                    $item->setGender($itemData['gender']);
                    $item->setCity($itemData['city']);
                    $item->setLanguages(json_encode($itemData['languages']));
                    $this->dynamicItemRepository->save($item);
                }
                return $result->setData(['success' => true, 'message' => __('Data saved successfully.')]);
            } catch (\Exception $e) {
                return $result->setData(['success' => false, 'message' => $e->getMessage()]);
            }
        }
        return $result->setData(['success' => false, 'message' => __('Invalid data.')]);
    }
}
