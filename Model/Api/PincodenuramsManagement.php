<?php

namespace Mbf\Pincodenurams\Model\Api;

use Mbf\Pincodenurams\Api\PincodenuramsManagementInterface;
use Mbf\Pincodenurams\Model\PincodenuramsFactory;

class PincodenuramsManagement implements PincodenuramsManagementInterface
{
    const SEVERE_ERROR = 0;
    const SUCCESS = 1;
    const LOCAL_ERROR = 2;

    protected $_pincodenuramsFactory;

    public function __construct(
        PincodenuramsFactory $pincodenuramsFactory

    ) {
        $this->_pincodenuramsFactory = $pincodenuramsFactory;
    }

    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Mbf\Pincodenurams\Api\Data\PincodenuramsInterface
     */
    public function getApiData($id)
    {
        try {
            $modelCollection = $this->_pincodenuramsFactory->create()->getCollection()->addFieldToFilter('pincode',$id);
			
			if (count($modelCollection) > 0){

				foreach( $modelCollection as $model ){
					$returnArray['error'] 	= '';
					$returnArray['status'] 	= 1;
					$returnArray['id'] 		= $model->getData('id');
					echo json_encode($returnArray);					
				}
				
			}else{
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('no data found')
                );				
			}

        } catch (\Magento\Framework\Exception\LocalizedException $e) {

            $returnArray['error'] 			= $e->getMessage();
            $returnArray['status'] 			= 0;
            $returnArray['id'] 				= 0;
            echo json_encode($returnArray);

        } catch (\Exception $e) {

            $returnArray['error'] 			= __('unable to process request');
            $returnArray['status'] 			= 2;
			$returnArray['id'] 				= 0;
            echo json_encode($returnArray);

        }
				
    }
}