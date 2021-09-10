<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 use App\Models\subcategory;

class SubCategoryController extends Controller
{
        public function data()
        {
                $cat = DB::table('subcategory')->get();
                return view('subcategory', compact("cat"));
        }
        public function tableData()
        {
                $cat = DB::table('subcategory')->join('catrgory','catrgory.id',"=",'subcategory.category_id')->select('subcategory.*','catrgory.categoryname')->get();
               
                return view('subcategorytable', compact("cat"));
        }
       
       
       
       
}
