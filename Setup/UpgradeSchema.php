<?php

namespace Alps\Tooltip\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        if(version_compare($context->getVersion(), '1.0.2', '<')) {
            
            $tableName = $setup->getTable('eav_attribute');

            
            if ($setup->getConnection()->isTableExists($tableName) == true) {

                $columns = [
                    'tooltip_description' => [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'default' => '',
                        'after' => 'note',
                        'comment' => 'Tooltip Description'
                    ],
                ];

                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    
                    $connection->addColumn($tableName, $name, $definition);
                }

            }
        }

        $setup->endSetup();
    }
}