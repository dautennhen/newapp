<?php

namespace App\Repositories;

class SearchRepository implements SearchRepositoryInterface {

    private $common;

    public function __construct() {
        $this->common = app('App\Common\Common');
    }

    public function listBuilder($data) {
        $lat = (float) $data['lat'];
        $long = (float) $data['long'];
        $starttime = $data['starttime'];
        $endtime = $data['endtime'];
        $distance = ((int) $data['distance']) / 1000;
        return "SELECT *, 
            ( 6371 * 
                ACOS( 
                    COS( RADIANS( $lat ) ) * 
                    COS( RADIANS( latlong.lat ) ) * 
                    COS( RADIANS( latlong.long ) - 
                    RADIANS( $long ) ) + 
                    SIN( RADIANS( $lat ) ) * 
                    SIN( RADIANS( latlong.lat ) ) 
                ) 
            ) 
            AS distance FROM latlong HAVING distance <= $distance AND datetime between '$starttime' and '$endtime' "
            . " ORDER BY distance ASC";
            
    }

    public function getList($data) {
        $list = $this->listBuilder($data);
        return $this->common->pagingSort($list, [], true, ['id']);
    }

}
