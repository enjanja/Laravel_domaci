<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


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

    function addToCart(Request $req){//API OK post
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

    function cartList(){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartList',['products'=>$products]);
    }

    function removeFromCart($id){//API OK get, iako bi trebalod a bude delete
        // Cart::destroy($id);
        // return redirect('cartList');

        $cart = Cart::find($id);
        $cart->delete();
        return redirect('cartList');
        // if($result){
        //     return ["Result"=>"Delete successful"];
        // }else{
        //     return ["Result"=>"Delete ERROR"];
        // }

    }
    
    function orderNow(){
        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $req){ //API OK post
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->addres = $req->addres;
            $order->save();
            //placing order
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    function myOrders(){
        $userId = Session::get('user')['id'];
        $orders =  DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders',['orders'=>$orders]);
    }

    function list($id=null){
        //id=null ->id moze da bude null 
        //ne vraca onda konkretno jedan prod
        //tad vrati sve

        return $id?Product::find($id):Product::all();
        //id=null -> vrati sve
        //moze i da se napravi odvojena f-ja za pojedinacne proizvode
        //al to je losiji nacin jer moras da imas dve rute i f-je
    }

    function searchProd($name){
        $result =  Product::where('name', 'like','%'.$name.'%')->get();
        if(count($result)){
            return $result;
        } else {
            return ["Result"=>"No mathces"];
        }
    }

    

}
