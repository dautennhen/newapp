<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\LatlongRequest;
use App\Http\Controllers\Controller;
use App\Repositories\LatlongRepositoryInterface;

class LatlongAjaxController extends Controller {

    protected $latlongRepo;

    public function __construct(LatlongRepositoryInterface $latlongRepo) {
        parent::__construct();
        $this->latlongRepo = $latlongRepo;
    }

    public function remove($id) {
        return $this->common->responseJson($this->latlongRepo->remove($id));
    }

    public function save($id, LatlongRequest $request) {
        return $this->common->responseJson($this->latlongRepo->save($id, $request));
    }

}
