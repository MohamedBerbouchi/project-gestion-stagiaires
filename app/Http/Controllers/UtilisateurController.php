<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{ 
    public function index()
    {
        $users = Utilisateur::all();

        return view('utilisateur.index', compact('users'));
    }
 
    public function create()
    {
        return view('utilisateur.create');
        
    }
 
    public function store(Request $request)
    {
        $request->validate([
            "login" => "required",
            "pwd" => "required",
            "role" => "required",
            "email" => "required|unique:utilisateurs,email",
        ]);
         Utilisateur::create($request->all());

       return redirect()->back()->with("success", "utilisateur est cree");
    }


    public function edit( $id)
    {
        $user = Utilisateur::find($id);
        return view('utilisateur.edit', compact('user'));
        
    }
 
    public function update(Request $request,  $id)
    {
         $utilisateur = Utilisateur::find($id);
        $utilisateur->update($request->all());
 
       return redirect()->back()->with("success", "utilisateur est modifier");
    }

  
    public function delete( $id)
    {
        $utilisateur = Utilisateur::find($id);
        $utilisateur->delete();
 
       return redirect()->back()->with("success", "utilisateur est supprimer");
    }
}
