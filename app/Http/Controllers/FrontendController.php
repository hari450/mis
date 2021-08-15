<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Product;
use App\Models\Product_part_number;
use App\Models\Parentcategory;
use DB;
class FrontendController extends Controller
{


    public function index(Request $request){
       $category = Categorys::paginate(5);

       if ($request->ajax()) {
        $view = view('frontend.loadcategory',compact('category'))->render();
        return response()->json(['html'=>$view]);
    }
     $product_part_number = DB::table('product_part_number')
    ->join('product', 'product.id', '=', 'product_part_number.product_id')
    ->join('childcategory', 'childcategory.id', '=', 'product.childcategory_id')
    ->join('parentcategory','parentcategory.id','=','childcategory.parentcategory_id')
    ->join('subcategory','subcategory.id','=','parentcategory.subcategory_id')
    ->join('category','category.id','=','subcategory.category_id')
    ->select('product_part_number.icon')
    ->where('category.id','=',1)
    ->get();



       return view('frontend.index')->with(compact('category','product_part_number'));
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

    public function parentcats($subcat_id){
       $parent_categorys = Parentcategory::where(['subcategory_id'=>$subcat_id])->get();
       return view('frontend.parentcategory')->with(compact('parent_categorys'));
    }

    public function productpartnumber($product_id){
        $part_number = Product_part_number::where('product_id',$product_id)->get();

        $specification = Product_part_number::with(['specification'=>function($query){
            $query->groupBy('specification_id');
        }])->where('product_id',$product_id)->get();

        return view('frontend.part_number')->with(compact('part_number','specification'));


    }
}
