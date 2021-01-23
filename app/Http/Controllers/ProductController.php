<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;


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

    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;//ovaj prod_id iz req je onaj koji smo poslali u form action add_to_cart
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }
    
    //static smo morali da dodamo jer u headeru u php delu
    //$total prom je staticka i mora da odgovori na ovu stat f-ju
    static function cartItem(){
        //da bismo vratili vrednosti iz sesije moramo da je importujemo prvo gore
        //te vrednosti koristimo da bismo prikazali koliko proizvoda u korpi ima trenutno ulogovani user
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
        //vraca prebrojane one cart iteme iz baze kod kojih je user_id = userId koji smo izvukli iz sesije
    }

    function cartList(Request $req){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartList',['products'=>$products]);
    }

    function removeFromCart($id){
        Cart::destroy($id);
        return redirect('cartList');
    }
    
    function orderNow(){
        
    }
}
