<?php
/**
 * Grid Schema Setup.
 * @category  Webkul
 * @package   Webkul_Grid
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */

namespace Ambab\EmiCalculator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('bank_details')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Grid Record Id'
        )->addColumn(
            'bank_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Bank Name'
        )->addColumn(
            'month',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '2M',
            ['nullable' => false],
            'Month'
        )->addColumn(
            'rate_of_int',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '10,2',
            ['nullable' => false],
            'RateOfInt'
        )
        // ->addColumn(
        //     'publish_date',
        //     \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
        //     null,
        //     [],
        //     'Publish Date'
        // )->addColumn(
        //     'is_active',
        //     \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
        //     null,
        //     [],
        //     'Active Status'
        // )
        ->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
            ],
            'Creation Time'
         )
         ->addIndex(  
            $installer->getIdxName(  
                 $installer->getTable('bank_details'),  
                 ['bank_name'],  
                 \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT  
            ),  
            [ 'bank_name'],  
            ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT]  
       )  
        //->addColumn(
        //     'update_time',
        //     \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
        //     null,
        //     [],
        //     'Modification Time'
        // )
        ->setComment(
            'Row Data Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}