<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function loginUtilisateur(Request $request)
    {
         $request->validate([
            
            "login" => "required",
            "pwd" => "required"
        ]
        );
        $Utilisateur = Utilisateur::where("login", "=",$request->login)->first();
        if($Utilisateur){
            if($Utilisateur->pwd != $request->pwd)
            {
                // use Hash
                // Hash::check($request->pwd, $Utilisateur->pwd)

              return redirect()->back()->with("fail", "mot de pass incorrect");
                
            }
            $request->session()->put("userId", $Utilisateur->id);
            return redirect()->route('home');
        }else{
              return redirect()->back()->with("fail", "error dans votre login ");
         }

    }


    public function home()
    {
        if (Session::has('userId')){
            $data = Utilisateur::where("id", "=",Session::get('userId')->login)->first();
            return view("home", compact("data"));
        }
    }

    public function logout()
    {
        // signout
        Session::pull('userId');

        return redirect('login');
    }


   
}
