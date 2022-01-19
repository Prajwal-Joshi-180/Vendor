<?php

namespace Codilar\Vendor\Model\Source\Config\Vendor;

use Codilar\Vendor\Model\ResourceModel\Vendor\Collection;

class Vendordropdown extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    
    /**
     * @var Collection
     */
    protected $collections;

    public function __construct(
        Collection $collections
    )
    {
        $this->collections = $collections;
    }


    /**
     * @return array
     */
    public function getAllOptions()
    {

        if (null === $this->_options) {
            foreach($this->collections as $collection) {
                if ($collection->getIsActive()) {
                    $this->_options[] = [
                        'label' => $collection->getVendorName(),
                        'value' => $collection->getEntityId()
                    ];
                }
            }
        }
        return $this->_options;
    }
}