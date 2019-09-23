<?php

namespace Alps\Tooltip\Model\ResourceModel;

class AlpsTooltip extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('alps_product_tooltip', 'id');
    }

   
}