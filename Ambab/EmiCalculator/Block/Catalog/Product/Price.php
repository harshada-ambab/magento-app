<?php
namespace Ambab\EmiCalculator\Block\Catalog\Product;

use Magento\Checkout\Model\Cart as CustomerCart;

class Price extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;
    protected $_orderPayment;
    protected $_paymentHelper;
    protected $_paymentConfig;

    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $priceHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry                      $registry
     * @param \Magento\Framework\Pricing\Helper\Data           $priceHelper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,

        \Ambab\EmiCalculator\Model\ResourceModel\Grid\Grid\Collection $orderPayment,
        \Magento\Payment\Helper\Data $paymentHelper,
        \Magento\Payment\Model\Config $paymentConfig,

        CustomerCart $cart,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->priceHelper = $priceHelper;

        $this->_orderPayment = $orderPayment;
        $this->_paymentHelper = $paymentHelper;
        $this->_paymentConfig = $paymentConfig;

        $this->cart = $cart;

        parent::__construct($context, $data);
    }

    public function getProductPrice()
    {
        $product = $this->registry->registry('current_product');
        return $product->getFinalPrice();
    }

    public function getAllPaymentMethods() 
    {
        return $this->_paymentHelper->getPaymentMethods();
    }
   
    public function getAllPaymentMethodsList() 
    {
        return $this->_paymentHelper->getPaymentMethodList();
    }
 

    public function getActivePaymentMethods() 
    {
        return $this->_paymentConfig->getActiveMethods();
    }
 

    public function getUsedPaymentMethods() 
    {
        $collection = $this->_orderPayment;
        $collection->getSelect()->group('method');
        $paymentMethods[] = array('value' => '', 'label' => 'Any');
        foreach ($collection as $col) { 
            $paymentMethods[] = array('value' => $col->getMethod(), 'label' => $col->getAdditionalInformation()['method_title']);            
    }        
        return $paymentMethods;
    }


    public function getSubtotal()
    {
        $totals = $this->cart->getQuote()->getTotals();

        $subtotal = $totals['subtotal']['value'];
        return $subtotal;
    }
}

