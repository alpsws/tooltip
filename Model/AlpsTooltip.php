<?php

namespace Alps\Tooltip\Model;


class AlpsTooltip  extends \Magento\Framework\Model\AbstractModel
{

    const CACHE_TAG = 'alps_product_tooltip';
  	protected function _construct()
    {
        $this->_init('Alps\Tooltip\Model\ResourceModel\AlpsTooltip');
    }

  
    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

}