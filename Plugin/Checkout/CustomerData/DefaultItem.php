<?php

namespace Magelearn\CartAttributes\Plugin\Checkout\CustomerData;
use Magento\Quote\Model\Quote\Item;

class DefaultItem
{
    public function aroundGetItemData($subject, \Closure $proceed, Item $item) {
        $data = $proceed($item);
		$_product = $item->getProduct();
		$result = [];
        $result['manufacturer'] = $_product->getResource()->getAttribute('manufacturer')->getFrontend()->getValue($_product);
        return array_merge($data,$result);
    }
}