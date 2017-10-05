<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production;

class IndexController extends Controller
{
    //
    public function index(){
        return view('manager.index');
    }
}
