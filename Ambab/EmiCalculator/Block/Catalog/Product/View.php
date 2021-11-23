<?php


namespace Ambab\EmiCalculator\Block\Catalog\Product;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\AbstractProduct;
use Ambab\EmiCalculator\Model\Grid;
use Ambab\EmiCalculator\Model\ResourceModel;
use Magento\Framework\App\ResourceConnection;


class View extends \Magento\Framework\View\Element\Template
{
   private $resourceConnection;
   protected $_dataHelper;
   protected $_GridFactory;
 
public function __construct(ResourceConnection $resourceConnection,
    \Magento\Framework\View\Element\Template\Context $context,
    \Ambab\EmiCalculator\Helper\Data $dataHelper,
    \Ambab\EmiCalculator\Model\GridFactory $GridFactory,
    array $data = []
) {
    $this->resourceConnection = $resourceConnection;
    $this->_dataHelper = $dataHelper;
    $this->_GridFactory = $GridFactory;
    parent::__construct($context, $data);
}


// Enable Module
public function canShowBlock()
{
    return $this->_dataHelper->isModuleEnabled();
}

//Get Unique Bank Name
public function BankData(){

     return $collection = $this->_GridFactory->create()->getCollection()
     ->distinct(true)
     ->addFieldToSelect('bank_name')
     ->load();
}


// Bank Details for Unique Bank Name
public function BankDetails($bankname){

    return $collection = $this->_GridFactory->create()->getCollection()
    ->addFieldToFilter('bank_name', ['like'=>$bankname])
    ->load();
    
}


// Emi, TotalPrice, InteresAmount Calculation
public function EmiCalculation($rate,$term,$amount){
    $emiarr=array();
    $rateofint = $rate/(12*100);
    $EMI = $amount * $rateofint * (pow(1 + $rateofint, $term)/ (pow(1 + $rateofint, $term) - 1));

    $NewEMI = ceil($EMI);
    $interest = $EMI*$term-$amount;
    $totalPrice = $amount + $interest;
    array_push($emiarr,$NewEMI,$interest,$totalPrice);
    return $emiarr;
}
}