<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SearchRepository;
use App\Repositories\PeopleRepository;

class SearchController extends Controller
{
    protected $searchRepo;
    
    public function __construct() {
        
        $this->searchRepo = new SearchRepository;
        $this->peopleRepo = new PeopleRepository;
    }
    
    public function index(Request $request)
    {
        $items = [];
        return view('search.list',compact('items'));
    }
    
    public function getList(Request $request)
    {
        $items = $this->searchRepo->getList( $request->all() );
        $people = $this->peopleRepo->getArray();
        return view('search.list',compact('items','people'));
    }
}
