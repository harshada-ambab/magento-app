<?php
// namespace Ambab\EmiCalc\Block\Catalog\Product;
// use Magento\Catalog\Block\Product\Context;
// use Magento\Catalog\Block\Product\AbstractProduct;

// class View extends AbstractProduct
// {
//     public function __construct(Context $context, array $data)
//     {
//         parent::__construct($context, $data);
//     }
// }

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

public function canShowBlock()
{
    return $this->_dataHelper->isModuleEnabled();
}
public function Collection(){

    return $collection = $this->_GridFactory->create()->getCollection();
}
public function BankData(){
    $collection = $this->_GridFactory->create()->getCollection();
    $tableName = $this->resourceConnection->getTableName('bank_details');
    $connection = $this->resourceConnection->getConnection();
    $query = $connection->select()->from($tableName,['bank_name'])->distinct(true);
    return $records = $connection->fetchAll($query);
    //$query = "SELECT COUNT(*),bank_name FROM $tableName GROUP BY bank_name HAVING 
    //COUNT(*) >= 1";
    //$result = $connection->fetchAll($query);

}
public function BankDetails($bankname){

    $tableName = $this->resourceConnection->getTableName('bank_details');
    $connection = $this->resourceConnection->getConnection();
    $query = $connection->select()->from($tableName)->where('bank_name=?',$bankname);
    return $records = $connection->fetchAll($query);
    // $query = "SELECT * FROM $tableName where bank_name = '$bankname'";
    // return $res = $connection->fetchAll($query);

}
public function EmiCalculation($rate,$term,$amount){
 $EMI = $amount * $rate * (pow(1 + $rate, $term)/ (pow(1 + $rate, $term) - 1));
 return $EMI;
}
}