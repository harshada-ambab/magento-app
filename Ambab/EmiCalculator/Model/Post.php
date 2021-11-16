<?php

namespace Ambab\EmiCalculator\Model;
 
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
        protected function _construct()
        {
                $this->_init('Ambab\EmiCalculator\Model\ResourceModel\Grid');
        }
 
        public function getIdentities()
        {
                return [self::CACHE_TAG . '_' . $this->getId()];
        }
 
        public function getDefaultValues()
        {
                $values = [];
 
                return $values;
        }
}