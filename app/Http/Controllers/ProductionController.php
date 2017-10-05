<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;

class ProductionController extends Controller
{
    //
    public function lists(){
        $productions = Production::get()->all();
        return response()->json(['info' => $productions]);
    }
}
