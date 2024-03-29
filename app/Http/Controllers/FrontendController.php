<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Product_part_number;
use App\Models\Parentcategory;
use App\Models\Subcategory;
use DB;
use DataTables;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class FrontendController extends Controller
{

    public function __construct()
    {


    }

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

    public function parentcats(Request $request,$subcat_id){

       $parent_categorys = Parentcategory::where(['subcategory_id'=>$subcat_id])->get();

       $subcatname = Subcategory::where('id','=',$subcat_id)->first();

    //    if ($request->ajax()) {
    //     $view = view('frontend.loadcategory',compact('category'))->render();
    //     return response()->json(['html'=>$view]);
    // }


       return view('frontend.parentcategory')->with(compact('parent_categorys','subcatname'));
    }



    public function productpartnumber($product_id){
        $part_number = Product_part_number::where('product_id',$product_id)->get();

        $specification = Product_part_number::with(['specification'=>function($query){
            $query->groupBy('specification_id');
        }])->where('product_id',$product_id)->get();

        return view('frontend.part_number')->with(compact('part_number','specification'));


    }

    public function listparents(Request $request,$parentcategory){
        // parentcategory is id
        $child = Childcategory::where('parentcategory_id','=',$parentcategory)->get();
        $childids =  $child->pluck('id')->toArray();
        $products = Product::wherein('childcategory_id',$childids)->get();
        $product_ids =  $products->pluck('id')->toArray();
        $part_number = Product_part_number::whereIn('product_id',$product_ids)->get();



        if ($request->ajax()) {
            if($request->get('prod_id')){
                $part_number = Product_part_number::where('product_id',$request->get('prod_id'))->get();
            }


            $data = $part_number;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img', function($row){
                        $im = url('')."/uploads/$row->icon";
                        $img = "<img class='table-image' src=".$im." width='70%' class='image-icon'>";
                         return $img;
                 })
                 ->addColumn('part_number', function($row){
                     $route = route('website.partnumberpage',$row->id);
                    $img = "<a href='".$route."' class='partnumber'>$row->part_number</a>";
                     return $img;
             })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['img','part_number','action'])
                    ->make(true);
        }

           $childcategory = [];


           return view('frontend.product_bychild')->with(compact('products','childcategory'));


   }



    public function products(Route $route, Request $request , $childategory_id  ){


       $products = Product::where('childcategory_id','=',$childategory_id)->get();
       $product_ids =  $products->pluck('id')->toArray();
       $part_number = Product_part_number::whereIn('product_id',$product_ids)->get();


       if ($request->ajax()) {
        if($request->get('prod_id')){
            $part_number = Product_part_number::where('product_id',$request->get('prod_id'))->get();
        }


        $data = $part_number;
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row){
                    $im = url('')."/uploads/$row->icon";
                    $img = "<img class='table-image' src=".$im." width='70%' class='image-icon'>";
                     return $img;
             })
             ->addColumn('part_number', function($row){
                 $route = route('website.partnumberpage',$row->id);
                $img = "<a href='".$route."' class='partnumber'>$row->part_number</a>";
                 return $img;
         })
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                })
                ->rawColumns(['img','part_number','action'])
                ->make(true);
    }

       $childcategory = Childcategory::where('id','=',$childategory_id)->first();


       return view('frontend.product_bychild')->with(compact('products','childcategory'));

    }


    public function partnumberpage($partno_id){

        $part_number = Product_part_number::where('id',$partno_id)->first();

        return view('frontend.singlepartnopage')->with(compact('part_number'));
    }



}
