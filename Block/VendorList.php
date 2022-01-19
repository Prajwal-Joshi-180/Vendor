<?php

namespace Codilar\Vendor\Block;

use Magento\Framework\View\Element\Template;
use Codilar\Vendor\Model\Vendor;
use Codilar\Vendor\Model\ResourceModel\Vendor\CollectionFactory;
Use Codilar\Vendor\Helper\Data;

class VendorList extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    /**
     * @var Data
     */
    protected $enableData;

    public function __construct(
        Template\Context $context,
        Data $enableData,
        CollectionFactory $collectionFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->enableData=$enableData;
    }

    /**
     * @return emp[]
     */
    public function getVendor()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
    public function getVendorUrl()
    {
        return $this->getUrl('vendor/vendor/index');
    }
    public function  VendorEnable()
    {
        if($this->enableData->isEnable()) {
            return 1;
        }
        else{
            return 0;
        }
    }
}
