<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Latlong;
use App\Repositories\LatlongRepositoryInterface;

class LatlongController extends Controller
{
    protected $latlongRepo;
    
    public function __construct(LatlongRepositoryInterface $latlongRepo) {
        
        $this->latlongRepo = $latlongRepo;
    }
    
    public function getList(Request $request)
    {
        $items = $this->latlongRepo->getList( $request->all() );
        return view('latlong.list',compact('items'));
    }
    
    public function getItem($id)
    {
        $item = Latlong::find($id);
        return view('latlong.detail',compact('item'));
    }
    
    public function newItem()
    {
        return view('latlong.new');
    }
    
    public function editItem($id)
    {
        $item = Latlong::find($id);
        return view('latlong.edit',compact('item'));
    }
}
