<?php

namespace App\Repositories;

use DB;

class LatlongRepository implements LatlongRepositoryInterface{
    private $common;
    private $model;
    
    public function __construct() {
        $this->common = app('App\Common\Common');
        $this->model = app('App\Models\Latlong');
    }
       
    public function getDetail($id){
        return $this->model->find($id);
    }
    
    public function listBuilder() {
        return DB::table('latlong')
                ->select('latlong.id', 
                        'latlong.lat',
                        'latlong.long',
                        'latlong.person_id',
                        'latlong.datetime',
                        'people.firstname', 
                        'people.lastname'
                        )
                ->join('people', 'people.id','=','latlong.person_id');
    }
    
    public function getList($data=[]) {
        $list = $this->listBuilder();
        return $this->common->pagingSort($list, $data, false, ['zipcode']);
    }

    public function getListJson($id, $data) {
        $list = $this->listBuilder($id);
        return $this->common->pagingSort($list, $data)->toJson();
    }
    
    // Ajax
    public function remove($key) {
        return $this->model->find($key)->delete();
    }
    
    public function save($id, $data) {
        return ($id == 0) ? $this->saveNew($id, $data) : $this->saveEdit($id, $data);
    }
    
    public function saveNew($id, $request) {
        $this->model->lat = $request->lat;
        $this->model->long = $request->long;
        $this->model->person_id = $request->person_id;
        $this->model->datetime = $request->datetime;
        return $this->model->save();
    }
    
    public function saveEdit($id, $request) {
        $item = $this->model->find($id);
        $item->lat = $request->lat;
        $item->long = $request->long;
        $item->person_id = $request->person_id;
        $item->datetime = $request->datetime;
        return $item->save();
    }
    
}
