
@extends('layouts.index')

@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
        <div class="col-sm-12">
                <h3 class="page-title">Afficher le Stagiaire</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('stagiaires.index') }}">Stagiaires</a></li>
                    <li class="breadcrumb-item active">afficher le stagiaire</li>
                </ul>
            </div>
            
        </div>
    </div>


    <div  id="filter_inputs" class="card filter-card">
        <div class="card-body pb-0" >
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row shadow  mb-5 bg-body rounded">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-center table-hover  text-center" style="font-size:10px">
                            <thead class="thead-light">
                                <tr>
                                    <th style="font-size:14px">Id</th>
                                    <th style="font-size:14px">Nom</th>
                                    <th style="font-size:14px">Année scolaire</th>
                                    <th style="font-size:14px">Filière</th>
                                    <th style="font-size:14px" >Classe</th>
                                    <th style="font-size:14px" >Resultat</th>
                                    <th style="font-size:14px" >Photo</th>
                                 </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>{{$stagiaire->id}} </td>
                                    <td>{{$stagiaire->nom}} </td>
                                    <td>{{$stagiaire->scolarite->annee_scolaire}}</td>
                                    <td>{{$stagiaire->scolarite->filiere->nom}}</td>
                                    <td>{{$stagiaire->scolarite->classe}}</td>
                                    <td>{{$stagiaire->scolarite->resultat}}</td>
                                    <td><img width="50" src={{ asset("images/" . $stagiaire->photo) }}></td>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection