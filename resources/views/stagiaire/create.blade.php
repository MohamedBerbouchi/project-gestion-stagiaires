
@extends('layouts.index')



@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Stagiaires</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('stagiaires.index') }}">Stagiaires</a></li>
                    <li class="breadcrumb-item active">Nouveau stagiaire</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stagiaires.store') }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PRENOM</label>
                                    <input type="text" name="prenom" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('prenom'))
                                            {{$errors->first('prenom')}}
                                    @endif
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('nom'))
                                            {{$errors->first('nom')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>DATE_NAISSANCE</label>
                                    <input type="date" name="date_naissance" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('date_naissance'))
                                            {{$errors->first('date_naissance')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>LIEU_NAISSANCE</label>
                                    <input type="text" name="lieu_naissance" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('lieu_naissance'))
                                            {{$errors->first('lieu_naissance')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>ADRESSE</label>
                                    <input type="text" name="adresse" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('adresse'))
                                            {{$errors->first('adresse')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>VILLE</label>
                                    <input type="text" name="ville" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('ville'))
                                            {{$errors->first('ville')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>CIN</label>
                                    <input type="text" name="cin" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('cin'))
                                            {{$errors->first('cin')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>TEL</label>
                                    <input type="text" name="tel" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('tel'))
                                            {{$errors->first('tel')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>NIVEAU SCOLAIRE</label>
                                    <select class="select" name="niveau_scolaire">
                                        <option>Select Country</option>
                                        <option selected>Afghanistan</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>American Samoa</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Anguilla</option>
                                        <option >United States</option>
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('niveau_scolaire'))
                                            {{$errors->first('niveau_scolaire')}}
                                    @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                               

                                <div class="form-group">
                                    <label>DERNIER DIPLOME:</label>
                                    <input type="text" name="dernier_diplome" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('dernier_diplome'))
                                            {{$errors->first('dernier_diplome')}}
                                    @endif
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>DERNIER ETABLISSMENT:</label>
                                    <input type="text" name="dernier_etablissement" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('dernier_etablissement'))
                                            {{$errors->first('dernier_etablissement')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>NUM D'INSCRIPTION</label>
                                    <input type="text" name="num_inscription" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('num_inscription'))
                                            {{$errors->first('num_inscription')}}
                                    @endif
                                    </p>
                                </div>
                
                                <div class="form-group">
                                    <label>DATE D'INSCRIPTION :</label>
                                    <input type="date" name="date_inscription" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('date_inscription'))
                                            {{$errors->first('date_inscription')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>CODE NATIONAL:</label>
                                    <input type="text" name="code_national" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('code_national'))
                                            {{$errors->first('code_national')}}
                                    @endif
                                    </p>
                                </div>
                                
                                <div class="form-group">
                                    <label>PHOTO:</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">
                                    @if($errors->has('photo'))
                                            {{$errors->first('photo')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Filière:</label>
                                    <select class="select" name="id_filiere">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('id_filiere'))
                                            {{$errors->first('id_filiere')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Année scolaie:</label>
                                    <select class="select" name="annee_scolaire">
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('annee_scolaire'))
                                            {{$errors->first('annee_scolaire')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Classe:</label>
                                    <select class="select" name="classe">
                                    <option value="1ere Annee"> 1ere Annee</option>
                                    <option value="2eme Annee"> 2eme Annee</option>
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('classe'))
                                            {{$errors->first('classe')}}
                                    @endif
                                    </p>
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

 