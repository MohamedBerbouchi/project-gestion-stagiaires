

@extends('layouts.index')



@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Edit Stagiaire</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{  route('home') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('stagiaires.index') }}">Stagiaires</a></li>
                    <li class="breadcrumb-item active">edit stagiaire</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="card" id="types">
        <div class="card-body">
            
        </div>
    </div>

    <div class="row shadow  mb-5 bg-body rounded">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stagiaires.update',$stagiaire->id) }}" method="post">
                    {!! csrf_field() !!}

                    @method("POST")
                <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PRENOM</label>
                                    <input type="text" name="prenom" class="form-control" value="{{$stagiaire->prenom}}">
                                    <p class="text-danger">
                                    @if($errors->has('prenom'))
                                            {{$errors->first('prenom')}}
                                    @endif
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom" class="form-control" value="{{$stagiaire->nom}}">
                                    <p class="text-danger">
                                    @if($errors->has('nom'))
                                            {{$errors->first('nom')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Date Naissance</label>
                                    <input type="date" name="date_naissance" class="form-control" value="{{$stagiaire->date_naissance}}">
                                    <p class="text-danger">
                                    @if($errors->has('date_naissance'))
                                            {{$errors->first('date_naissance')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Lieu Naissance</label>
                                    <input type="text" name="lieu_naissance" class="form-control" value="{{$stagiaire->lieu_naissance}}">
                                    <p class="text-danger">
                                    @if($errors->has('lieu_naissance'))
                                            {{$errors->first('lieu_naissance')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse" class="form-control" value="{{$stagiaire->adresse}}">
                                    <p class="text-danger">
                                    @if($errors->has('adresse'))
                                            {{$errors->first('adresse')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Ville</label>
                                    <input type="text" name="ville" class="form-control" value="{{$stagiaire->ville}}">
                                    <p class="text-danger">
                                    @if($errors->has('ville'))
                                            {{$errors->first('ville')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>CIN</label>
                                    <input type="text" name="cin" class="form-control" value="{{$stagiaire->cin}}">
                                    <p class="text-danger">
                                    @if($errors->has('cin'))
                                            {{$errors->first('cin')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>TEL</label>
                                    <input type="text" name="tel" class="form-control" value="{{$stagiaire->tel}}">
                                    <p class="text-danger">
                                    @if($errors->has('tel'))
                                            {{$errors->first('tel')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>NIVEAU SCOLAIRE</label>
                                    <select class="select" name="niveau_scolaire">
                                          <option value="1"  @selected($stagiaire->civilite == "1")>9 Af ou diplome spécialisation</option>
                                         <option value="2"  @selected($stagiaire->civilite == "2")>Niveau Bac ou diplome Qualification</option>
                                          <option value="3"  @selected($stagiaire->civilite == "3")>Bachelier ou diplome Technecien</option>
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
                                    <input type="text" name="dernier_diplome" class="form-control" value="{{$stagiaire->dernier_diplome}}">
                                    <p class="text-danger">
                                    @if($errors->has('dernier_diplome'))
                                            {{$errors->first('dernier_diplome')}}
                                    @endif
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>DERNIER ETABLISSMENT:</label>
                                    <input type="text" name="dernier_etablissement" class="form-control" value="{{$stagiaire->dernier_etablissement}}">
                                    <p class="text-danger">
                                    @if($errors->has('dernier_etablissement'))
                                            {{$errors->first('dernier_etablissement')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>NUM D'INSCRIPTION</label>
                                    <input type="text" name="num_inscription" class="form-control" value="{{$stagiaire->num_inscription}}">
                                    <p class="text-danger">
                                    @if($errors->has('num_inscription'))
                                            {{$errors->first('num_inscription')}}
                                    @endif
                                    </p>
                                </div>
                
                                <div class="form-group">
                                    <label>DATE D'INSCRIPTION :</label>
                                    <input type="date" name="date_inscription" class="form-control" value="{{$stagiaire->date_inscription}}">
                                    <p class="text-danger">
                                    @if($errors->has('date_inscription'))
                                            {{$errors->first('date_inscription')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>CODE NATIONAL:</label>
                                    <input type="text" name="code_national" class="form-control" value="{{$stagiaire->code_national}}">
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

                                    @foreach ($filieres as $filiere)
                                        
                                        <option value="{{$filiere->id}}" @selected($filiere->id == $stagiaire->scolarite->id_filiere)>{{$filiere->nom}}</option>
                                    @endforeach
                                      
                                    
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('id_filiere'))
                                            {{$errors->first('id_filiere')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                  @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10;
                                    $years = range($currentYear,$startYear);
                                     
                                @endphp

                                    <label>Année scolaie:</label>
                                    <select class="select" name="annee_scolaire">
                                        
                                        @foreach ($years as $year)
                                    <option value="{{$year}}-{{$year+1}}"  @selected($stagiaire->scolarite->annee_scolaire == "$year-{{$year+1}}")>{{ $year }}/{{ $year + 1 }}</option>
                                         @endforeach
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
                                    <option value="1ere Annee" @selected($stagiaire->scolarite->classe == "1ere Annee")> 1ere Annee</option>
                                    <option value="2eme Annee" @selected($stagiaire->scolarite->classe == "2eme Annee")> 2eme Annee</option>
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('classe'))
                                            {{$errors->first('classe')}}
                                    @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>civilite:</label>
                                    <select class="select" name="civilite">
                                    <option value="H" @selected($stagiaire->civilite == "H")> Homme</option>
                                    <option value="F"  @selected($stagiaire->civilite == "F")> Femme</option>
                                    </select>
                                    <p class="text-danger">
                                    @if($errors->has('civilite'))
                                            {{$errors->first('civilite')}}
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer <i class="fe fe-save "></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 
