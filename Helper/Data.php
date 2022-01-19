<?php

namespace Codilar\Vendor\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper {

    /**
     * @var Context
     */
    protected $context;


    public function __construct(Context $context)
    {
        $this->context = $context;
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function isEnable()
    {
        return $this->scopeConfig->getValue('vendor/general/enable', ScopeInterface::SCOPE_STORE);
    }
}