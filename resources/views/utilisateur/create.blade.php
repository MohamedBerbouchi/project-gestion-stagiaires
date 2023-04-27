
@extends('layouts.index')



@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Nouveau Utilisateurs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('utilisateurs.index') }}">Utilisateurs</a></li>
                    <li class="breadcrumb-item active">Nouveau Utilisateur</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control">
                                </div>
                            
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control">
                                </div>
                             
                                
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="text" class="form-control">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select">
                                        <option>Select Country</option>
                                        <option>Secrétaire</option>
                                        <option>Directeur</option>
                                     
                                    </select>
                                </div>
                                
                            </div>

                            
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer le Utilisateur <i class="fe fe-save "></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 