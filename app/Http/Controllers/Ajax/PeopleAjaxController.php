<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;
use App\Repositories\PeopleRepositoryInterface;

class PeopleAjaxController extends Controller
{
    //private $common;
    protected $peopleRepo;
    
    public function __construct(PeopleRepositoryInterface $peopleRepo) {
        parent::__construct();
        $this->peopleRepo = $peopleRepo;
    }
    
    public function remove($id) {
        return $this->common->responseJson($this->peopleRepo->remove($id));
    }
    
    public function save($id, PeopleRequest $request) {
        return $this->common->responseJson($this->peopleRepo->save($id, $request));
    }
}
