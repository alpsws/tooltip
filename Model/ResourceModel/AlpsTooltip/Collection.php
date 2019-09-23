<?php

namespace Alps\Tooltip\Model\ResourceModel\AlpsTooltip;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    
   	protected function _construct()
    {
        $this->_init('Alps\Tooltip\Model\AlpsTooltip', 'Alps\Tooltip\Model\ResourceModel\AlpsTooltip');
    }

}