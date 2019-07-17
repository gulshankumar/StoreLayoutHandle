<?php

/**
 * This file is part of GulshanDev_StoreLayoutHandle Module
 *
 * @author Gulshan Kumar <gulshan.4dream@gmail.com>
 */

namespace GulshanDev\StoreLayoutHandle\Observer;

use Magento\Framework\Event\ObserverInterface;

class AddStoreLayout implements ObserverInterface
{
    protected $storeManager;
    
   /**
     * AddStoreLayout constructor.
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        $layout = $observer->getLayout();
        $layout->getUpdate()->addHandle('store_'.$this->storeManager->getStore()->getCode());
    }
}