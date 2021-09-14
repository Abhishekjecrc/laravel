<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productdetails extends Controller
{
    //
       public function formsubmit(Request $request)
       {

            $request->validate([
                'name'=>'required',
                'brand'=>'required',
                'model'=>'required',
                'category'=>'required',
                'gender'=>'required',
                'size_group'=>'required',
                'color'=>'required',
                'description'=>'required'               
            ]);
           return $request->input();
       }

       public function getdetails(){
        $category = DB::table('catrgory')->where('status' ,'=','Active')->get();
        $size = DB::table('size')->where('status','=','Active')->get();
        return view('adddetails', compact(  'category','size'));
       }
}