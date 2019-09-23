<?php

namespace Alps\Tooltip\Observer;
use \Magento\Framework\Event\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsaveafter implements ObserverInterface
{    

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
	   	$_product_id = $observer->getProduct()->getId();  // you will get product object
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$data = $observer->getProduct()->getProductOptions();
		if($data)
		{
			foreach ($data as  $option) 
			{
				
				if($option['option_id'] != 0)
				{
					$model = $objectManager->create('Alps\Tooltip\Model\AlpsTooltip');
					$model->load($option['option_id'],'option_id');
					if($model->getId())
					{
						$model->setProductId($_product_id);
						$model->setOptionId($option['option_id']);
						$model->setProductTooltipDescription($option['producttooltipdescription']);
						$model->setCreatedAt(time());
						$model->save();
					}
					else{
						$model1 = $objectManager->create('Alps\Tooltip\Model\AlpsTooltip');
						$model1->setProductId($_product_id);
						$model1->setOptionId($option['option_id']);
						$model1->setProductTooltipDescription($option['producttooltipdescription']);
						$model1->setCreatedAt(time());
						$model1->save();	
					}
					
				}

				if($option['is_delete'] == 1)
				{
					$model = $objectManager->create('Alps\Tooltip\Model\AlpsTooltip');
					$model = $objectManager->create('Alps\Tooltip\Model\AlpsTooltip');
					$model->load($option['option_id'],'option_id');
					$model->delete();
				}
			}
			
		}
	}   
}