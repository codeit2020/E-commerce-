<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        if ( request()->category ) {
           $products = Product::with('categories')->whereHas('categories', function($query){
               $query->where('slug', request()->category );
           })->orderBy('created_at', 'DESC')->paginate(6);
        }else {
            $products = Product :: with('categories')->orderBy('created_at', 'DESC')->paginate(6);
        }

        
        
        return view('products.index')->with('products',$products);
    }

    public function show($slug){

        $products = Product :: where('slug', $slug)-> firstOrFail();
        
        return view('products.show')->with('products',$products);
    }


}
