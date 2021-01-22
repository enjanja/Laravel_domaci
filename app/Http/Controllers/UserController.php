<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;//importujemo hash za proveru pass
use Illuminate\Http\Request;
use App\Models\User; //povezali smo s user modelom

class UserController extends Controller
{
    //
    function login(Request $req){
        $user =  User::where(['email'=>$req->email])->first(); //postavimo sve ovo u user prom
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not mathced";
            //ako nema usera izbaci poruku
        }else{
            $req->session()->put('user',$user);
            //pokrecemo sesiju
            //kad smo ovo dodali, on moze uvek da se vrati na login sto ne bi smeo kad je vec ulogovan
            //zato pravimo middleware
            return redirect('/');
            //ako se poklapa sa userom u bazi onda ga prebaci na homepage
            //za to je potrebno da prvo napravimo ProductController
            //$ php artisan make:controller ProductController
        }
    }
}
