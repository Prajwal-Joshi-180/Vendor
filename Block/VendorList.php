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
        CollectionFactory $collectionFactory,
        Data $enableData,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->enableData=$enableData;
    }

    /**
     * @return vendor[]
     */
    public function getVendor()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }

    /**
     * Get URL for index page
     *
     * @return string
     */
    public function getVendorUrl()
    {
        return $this->getUrl('vendor/vendor/index');
    }

    /**
     * @return int
     */
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
