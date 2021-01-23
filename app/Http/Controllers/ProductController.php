<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function index(){
        $data = Product::all();

        return view('product',['products'=>$data]);//prvo pravimo staitcki slajder a posle cemo da ga doradimo
        //posle cemo da ga napravimo da bude dinamican tj da nam treba samo 1 onaj div sa svim unutra
        //to unutra ce da se menja

    }

    function detail($id){
        $data =  Product::find($id);//iz baze Products izvlaci proizvod sa prosledjenim id-em
        return view('detail',['product'=>$data]);
    }

    function search(Request $req){
        $data=Product::where('name', 'like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
    
}
