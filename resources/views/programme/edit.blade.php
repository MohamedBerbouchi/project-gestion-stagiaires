
@extends('layouts.index')



@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Stagiaires</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('programmes.index') }}">Programmes</a></li>
                    <li class="breadcrumb-item active">Modifier la matière
                    </li>
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
                                    <label>Nom matière</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nombre d'heure TP</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Coefficien</label>
                                    <input type="text" class="form-control">
                                </div>
                                
                                 
                            </div>

                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Nombre d'heure</label>
                                    <input type="text" class="form-control">
                                </div>
                                 
                                <div class="form-group">
                                    <label>Nombre d'heure TH :</label>
                                    <input type="text" class="form-control">
                                </div>
                          
                                
                                 
                                
                                 
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer  <i class="fe fe-save "></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 