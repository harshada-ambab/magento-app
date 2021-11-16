<?php

namespace Ambab\EmiCalculator\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Thecoachsmb\Mymodule\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates sample articles
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // if ($context->getVersion()
        //     && version_compare($context->getVersion(), '1.1.1') < 0
        // ) {
            $tableName = $setup->getTable('bank_details');
            

            $data = [
                [
                    'entity_id' => 7,
                    'bank_name' => 'Kotak',
                    'month' => 6,
                    'rate_of_int' => 10,


                ],
                [
                    'entity_id' => 8,
                    'bank_name' => 'Bank Of Baroda',
                    'month' => 12,
                    'rate_of_int' => 15,
                ],
            ];

            // $setup
            //     ->getConnection()
            //     ->insertMultiple($tableName, $data);
                foreach($data as $value)
                {
                    $setup->getConnection()->insert($tableName,$value);
                }
        // }

        $setup->endSetup();
    }
}