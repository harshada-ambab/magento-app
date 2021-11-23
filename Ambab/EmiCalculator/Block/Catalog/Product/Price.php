<?php
namespace Ambab\EmiCalculator\Block\Catalog\Product;

use Magento\Checkout\Model\Cart as CustomerCart;

class Price extends \Magento\Framework\View\Element\Template
{
    
    protected $registry;
  
    protected $priceHelper;

   
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,


        CustomerCart $cart,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->priceHelper = $priceHelper;

        $this->cart = $cart;

        parent::__construct($context, $data);
    }

// Get Product Price
    public function getProductPrice()
    {
        $product = $this->registry->registry('current_product');
        return $product->getFinalPrice();
    }

    
// Get OrderTotal
    public function getOrdertotal()
    {
        $grandTotal = $this->cart->getQuote()->getGrandTotal();
        return $grandTotal;
    }
}

