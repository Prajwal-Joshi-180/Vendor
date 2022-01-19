<?php
namespace Codilar\Vendor\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Api\ProductAttributeMediaGalleryManagementInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Store\Model\StoreManagerInterface;
use Codilar\Vendor\Helper\Data;


class Vendor extends Template
{
    /**
     * @var Registry
     */
    private  $registry;

    /**
     * @var StockRegistryInterface
     */
    private  $stockRegistry;
    
    /**
     * @var ProductFactory
     */
    protected $productFactory;
    
    /**
     * @var ProductAttributeMediaGalleryManagementInterface
     */
    private $attributeMediaGalleryManagement;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var Data
     */
    protected $enableData;


    /**
     * @param Template\Context $context
     * @param Registry $registry
     * @param ProductFactory $productFactory
     * @param ProductRepository $productRepository
     * @param ProductAttributeMediaGalleryManagementInterface $attributeMediaGalleryManagement
     * @param StoreManagerInterface $storemanager
     * @param Data $enableData
     * @param array $data
     */

     
    public function __construct(
        Template\Context $context,
        Registry $registry,
        ProductFactory $productFactory,
        ProductRepository $productRepository,
        ProductAttributeMediaGalleryManagementInterface $attributeMediaGalleryManagement,
        StoreManagerInterface $storemanager,
        Data $enableData,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->productFactory = $productFactory;
        $this->_storeManager =  $storemanager;
        $this->attributeMediaGalleryManagement = $attributeMediaGalleryManagement;
        $this->enableData=$enableData;
    }

    /**
     * @return currentProduct
     */
    protected function getCurrentProduct()
    {
        return $this->registry->registry('product');
    }

    /**
     * @return string
     */
    public function  getVendorName()
    {
        $product=$this->getCurrentProduct();
        return $product->getAttributeText('vendor');
    }


    /**
     * @return int
     */
    public function getAttributeID()
    {
        $attrCode='vendor';
        $optLabel= $this->getVendorName();
        $product = $this->productFactory->create();
        $isAttrExist = $product->getResource()->getAttribute($attrCode);
        $optId = '';
        if ($isAttrExist && $isAttrExist->usesSource()) {
            $optId = $isAttrExist->getSource()->getOptionId($optLabel);
        }
        return $optId;
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