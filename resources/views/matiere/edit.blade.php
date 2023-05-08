
@extends('layouts.index')



@section('content')
<div class="content container-fluid">
    
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Matières</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('matieres.index') }}">Matières</a></li>
                    <li class="breadcrumb-item active">Modifier la Matières</li>
                </ul>
            </div>
        </div>
    </div>
    @if (session('success') )
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 1.5em" > 
        <strong>
            <strong>
            
                <i class="fe fe-thumbs-up"  data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-thumbs-up" aria-label="fe fe-thumbs-up"></i>
            </strong>    
        </strong> {{session('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('matieres.update',$matiere->id) }}" method="post">
                        @csrf
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom matière</label>
                                    <input type="text" name="nom" class="form-control" value="{{$matiere->nom}}">
                                    @error('nom')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nombre d'heure TP</label>
                                    <input type="text" name="nombre_heure_tp" class="form-control" value="{{$matiere->nombre_heure_tp}}">
                                    @error('nombre_heure_tp')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Coefficien</label>
                                    <input type="text" name="coef" class="form-control" value="{{$matiere->coef}}">
                                    @error('coef')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre d'heure</label>
                                    <input type="text" name="nombre_heure_total" class="form-control"  value="{{$matiere->nombre_heure_total}}">
                                    @error('nombre_heure_total')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nombre d'heure TH</label>
                                    <input type="text" name="nombre_heure_th" class="form-control"  value="{{$matiere->nombre_heure_th}}">
                                    @error('nombre_heure_th')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer le Stagiaire <i class="fe fe-save "></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 