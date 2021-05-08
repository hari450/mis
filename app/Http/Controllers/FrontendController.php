<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Product;
use App\Models\Product_part_number;
use DB;
class FrontendController extends Controller
{
   
    
    public function index(Request $request){
       $category = Categorys::all();
       
       return view('frontend.index')->with(compact('category'));
    }

    public function product($childcategory_id){
        $products = Product::where('childcategory_id',$childcategory_id)->get();
        return view('frontend.product')->with(compact('products'));
    }

    public function part($product_id){
        $part_number = Product_part_number::where('product_id',$product_id)->get();
        
     

$specification = Product_part_number::with(['specification'=>function($query){
    $query->groupBy('specification_id');
}])->where('product_id',$product_id)->get();


        return view('frontend.part_number')->with(compact('part_number','specification'));
    }
}
