<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    public function search(Request $request){
        if($request->has('q')){
            $q = $request->q;
            $result = DB::table('tasks')->where('task_title','like','%'.$q.'%')->get();
            return response()->json($result);
        }
        else return view('welcome');
    }
}
