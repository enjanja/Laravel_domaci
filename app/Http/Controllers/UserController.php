<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;//importujemo hash za proveru pass
use Illuminate\Http\Request;
use App\Models\User; //povezali smo s user modelom
use Validator;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    //
    function login(Request $req){
        $user =  User::where(['email'=>$req->email])->first(); //postavimo sve ovo u user prom
        if(!$user || !Hash::check($req->password,$user->password)){
            return redirect()->back();
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



    function add(Request $req){
        $rules = array(
            "name"=>"required|min:3",
            "email"=>"required|min:6",
            "password"=>"required|min:3|max:20"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $user = new user;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $result = $user->save();
            if($result){
                return redirect('/login');
            }else{
                return ["Result"=>"Error"];
            }
        }
        
    }//radi

    function update(Request $req, $id){
        return["User"=>$id];
        $rules = array(
            "name"=>"required|min:3",
            "email"=>"required|min:6",
            "password"=>"required|min:3|max:20"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $user = User::find($id);
            $result = $user->update($req->all());
            if($result){
                // return redirect('/myorders');
                return ["Result"=>"Data has been updated"];
            }else{
                return ["Result"=>"Error"];
            }
        }

        // $user = User::find($req->id);
        // $user->name = $req->name;
        // $user->email = $req->email;
        // $user->password = Hash::make($req->password);
        // $result = $user->save();
        // if($result){
        //     return ["Result"=>"Data has been updated"];
        // }else{
        //     return ["Result"=>"Error"];
        // }
    }//ne radiiiii



    function delete($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return redirect("/logout");
        }else{
            return ["Result"=>"Delete ERROR"];
        }
        
    }//RADI

    /***************************************** */
    /***************************************** */
    /***************************************** */
        // function register(Request $req){
    //     // return $req->input();
    //     // $user = new User;
    //     // $user->name = $req->name;
    //     // $user->email = $req->email;
    //     // $user->password = Hash::make($req->password);
    //     // $user->save();
    //     // return redirect('/login');

    //     $user = new user;
    //         $user->name = $req->name;
    //         $user->email = $req->email;
    //         $user->password = Hash::make($req->password);
    //         $result = $user->save();
    //         if($result){
    //             return ["Result"=>"Data has been saved"];
    //         }else{
    //             return ["Result"=>"Error"];
    //         }
    // }
    /***************************************** */
    /***************************************** */
    /***************************************** */



    // public function user(){
    //     return response()->json(User::get(),200);
    //     //vraca sve usere u json formatu, i poruku 200(OK)
    // }

    // public function userByID($id){
    //     // return response()->json(User::find($id),200);
    //     //vraca usera sa trazenim id-em
    //     //ovo gore je bez hendlovanja exceptiona
    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json("User not foud",404);
    //     }

    // }

    // public function saveUser(Request $req){
    //     $user = User::create($req->all());
    //     return response()->json($user,201);
    //     //ovde se u postmanu posalje i trebalo bi da se sacuva osim sto mi ne radi

    // }
    // public function saveUser(Request $req){
    //     $rules = [//postavimo ogranicenja 
    //         'name' => 'required|min:3',
    //         'email' => 'required|min:5',
    //         'password' => 'required|min:3|max:10',
    //     ];

    //     $validator = Validator::make($req->all(),$rules);
    //     if($validator->fails()){
    //         return response()->json($validator->errors(),400);
    //         //server ne razume zahtev zbog lose sintaxe
    //         //proverimo upostmanu
    //     }

    //     $user = User::create($req->all());
    //     return response()->json($user,201);
    //     //ovde se u postmanu posalje i trebalo bi da se sacuva osim sto mi ne radi

    // }

    


    /***************************************** */
    /***************************************** */
    /***************************************** */
    // public function updateUser(Request $req, User $user){
    //     $user->update($req->all());
    //     return response()->json($user,201);
    //     //kod zadatog usera apdejtujemo sve sto se apdejtovati da
    // }
    // public function updateUser(Request $req, $id){
    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json("User not foud",404);
    //     }
    //     $user->update($req->all());
    //     return response()->json($user,201);
    //     //kod zadatog usera apdejtujemo sve sto se apdejtovati da
    //     //USER NOT FOUND EXCEPTION
    // }
    // public function updateUser(Request $req, $id){
    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json(["message"=>"User not foud"],404);
    //     }
    //     $user->update($req->all());
    //     return response()->json($user,201);
    //     //kod zadatog usera apdejtujemo sve sto se apdejtovati da
    //     //USER NOT FOUND EXCEPTION
    // }

    //********************************************** */
    // public function deleteUser(Request $req, User $user){
    //     $user->delete();
    //     return response()->json(null,204);
    //     //u postmenu proverimo dal radi, ako ne vrati nista onda je ok
    // }
    // public function deleteUser(Request $req,  $id){
    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json("User not foud",404);
    //     }
    //     $user->delete();
    //     return response()->json(null,204);
    //     //u postmenu proverimo dal radi, ako ne vrati nista onda je ok
    //     //USER NOT FOUND EXCEPTION
    // }
    // public function deleteUser(Request $req,  $id){
    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json(["message"=>"User not foud"],404);
    //     }
    //     $user->delete();
    //     return response()->json(null,204);
    //     //u postmenu proverimo dal radi, ako ne vrati nista onda je ok
    //     //USER NOT FOUND EXCEPTION
    //     //
    // }

    
    
}
