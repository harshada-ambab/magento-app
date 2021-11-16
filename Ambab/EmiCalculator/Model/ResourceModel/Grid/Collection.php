<?php


namespace Ambab\EmiCalculator\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Ambab\EmiCalculator\Model\Grid', 'Ambab\EmiCalculator\Model\ResourceModel\Grid');
    }
}

