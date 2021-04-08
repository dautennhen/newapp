<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SearchRepository;
use App\Repositories\PeopleRepository;

class HomeController extends Controller
{
   
    public function index()
    {
            return redirect('/people');

    }
}
