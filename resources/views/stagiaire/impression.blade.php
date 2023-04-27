

@extends('layouts.index')


@section('content')
<div class="content container-fluid b h-100" >

    <div class="page-header h-100">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Imprimer le Document</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('stagiaires.index') }}">Stagiaires</a></li>
                    <li class="breadcrumb-item active">imprimer le document</li>
                </ul>
            </div>
        </div>
        

        <div class="row  h-100">
            <div class="col-sm-12">
                <div class="container col-md-12 col-md-offset-3  text-center mt-5 h-100">
                    <h2 class="mb-5">Séléctionner le document à imprimer</h2>
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            
                            <a class="btn btn-primary" 	href="{{ route('stagiaires.impAttIns',$stagiaire->id)}}">
                                Attestation d'inscription <i class="fe fe-download me-1"></i> 
                            </a>
                            
                            <a class="btn btn-success" href="{{ route('stagiaires.AttDeSco',$stagiaire->id)}}">
                                Attestation de scolarité <i class="fe fe-download me-1"></i> 
                            </a>
                            
                            <a class="btn btn-info text-white" href="{{ route('stagiaires.impDemDeSta',$stagiaire->id)}}">
                                Demande de Stage <i class="fe fe-download me-1"></i> 
                            </a>
                        
                        </div>
                    </div>			
                </div>
            </div>
		</div>


   
</div>
@endsection


