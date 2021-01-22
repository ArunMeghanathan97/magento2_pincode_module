<?php
 
namespace Mbf\Pincodenurams\Api;
 
interface PincodenuramsManagementInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Mbf\Pincodenurams\Api\Data\PincodenuramsInterface
     */
    public function getApiData($id);
}