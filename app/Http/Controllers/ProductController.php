<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Product;

class ProductController extends Controller
{
     public function index(Request $request){
		// if($request->ajax()){
		// 	return response()->json(['ajax']);
		// }

    	$product = Product::paginate(6);
    	return view('welcome')->with('product',$product);
    }
    public function storeProduct(Request $request){

    	$product =new Product;
    	$product->name =$request->name;
    	$product->quantity=$request->quantity;
    	$product->price=$request->price;
    	$product->total=($request->quantity * $request->price);
    	$product->save();
    	return response()->json($product);

    }
}
