<?php

namespace App\Repositories;

use DB;

class PeopleRepository implements PeopleRepositoryInterface {
    private $common;
    private $model;
    
    public function __construct() {
        $this->common = app('App\Common\Common');
        $this->model = app('App\Models\People');
    }
    
    public function getFirst(){
        $item = new People();
        return $item->first();
    }
    
    public function getDetail($id){
        $item = new People();
        return $item->find($id);
    }
    
    public function listBuilder() {
        return DB::table('people')
            ->select('people.id', 'people.firstname', 'people.lastname');
    }
    
    public function getList($data=[]) {
        $list = $this->listBuilder();
        return $this->common->pagingSort($list, $data, false, ['zipcode']);
    }

    public function getArray() {
        $list = $this->listBuilder()->get();
        $arr = [];
        foreach($list as $item) {
            $arr[$item->id] = $item;
        }
        return $arr;
    }
    
    public function getListJson($id, $data) {
        $list = $this->listBuilder($id);
        return $this->common->pagingSort($list, $data)->toJson();
    }
    
    static public function optionPeople($selected=''){
        $str = '';
        $items = (new self)->model->all();
        foreach($items as $item) {
            $selectedItem = ($selected==$item->id) ? 'selected' : '';
            $str = $str . '<option value="'.$item->id.'" '. $selectedItem .' >'.$item->firstname. '' . $item->lastname .'</option>';
        }
        return $str;
    }
    
    // Ajax
    public function remove($key) {
        return $this->model->find($key)->delete();
    }
    
    public function save($id, $data) {
        return ($id == 0) ? $this->saveNew($id, $data) : $this->saveEdit($id, $data);
    }
    
    public function saveNew($id, $request) {
        $this->model->firstname = $request->firstname;
        $this->model->lastname = $request->lastname;
        return $this->model->save();
    }
    
    public function saveEdit($id, $request) {
        $item = $this->model->find($id);
        $item->firstname = $request->firstname;
        $item->lastname = $request->lastname;
        return $item->save();
    }
    
}
