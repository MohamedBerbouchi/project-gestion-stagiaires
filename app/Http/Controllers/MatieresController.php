<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('matiere.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matiere.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function show(Matieres $matieres)
    {
        // return view('matiere.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function edit(Matieres $matieres)
    {
        return view('matiere.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matieres $matieres)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matieres $matieres)
    {
        //
    }
}
