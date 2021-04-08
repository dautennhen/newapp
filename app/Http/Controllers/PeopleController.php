<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\People;
use App\Repositories\PeopleRepositoryInterface;

class PeopleController extends Controller
{
    protected $peopleRepo;
    
    public function __construct(PeopleRepositoryInterface $peopleRepo) {
        
        $this->peopleRepo = $peopleRepo;
    }
    
    public function index()
    {
    }
    
    public function getList(Request $request)
    {
        $items = $this->peopleRepo->getList( $request->all() );
        return view('people.list',compact('items'));
    }
    
    public function getItem($id)
    {
        $item = People::find($id);
        return view('people.detail',compact('item'));
    }
    
    public function newItem()
    {
        return view('people.new');
    }
    
    public function editItem($id)
    {
        $item = People::find($id);
        return view('people.edit',compact('item'));
    }
}
