@extends('layouts.index')



@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Filières</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('stagiaires.index') }}">Filières</a></li>
                        <li class="breadcrumb-item active">Nouveau Filières</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('filieres.store') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" value="{{old('nom')}}">
                                        @error('nom')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Niveau diplôme</label>


                                        <select name="niveau_diplome" class="select">
                                            <option value="Q">Qualification</option>
                                            <option value="T">Technicien</option>
                                            <option value="TS">Technicien Spécialisé</option>
                                            <option value="FC">Attestation de FC</option>
                                        </select>
                                        @error('niveau_diplome')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Durée de Formation</label>
                                        <input type="text" name="duree_formation" class="form-control" value="{{old('duree_formation')}}">
                                        @error('duree_formation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Niveau d'admission</label>
                                        <select class="select" name="niveau_admission">
                                            <option value="1">9 Af ou diplome Spécialisation</option>
                                            <option value="2">Niveau Bac ou diplome Qualification</option>
                                            <option value="3">Bachelier ou diplome Technicien</option>
                                        </select>
                                        @error('niveau_admission')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stage1</label>
                                        <input type="text" name="stage1" class="form-control" value="{{old('stage1')}}">
                                        @error('stage1')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stage2</label>
                                        <input type="text" name="stage2" class="form-control" value="{{old('stage2')}}">
                                        @error('stage2')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Frais d'inscription</label>
                                        <input type="text" name="frais_inscription" class="form-control" value="{{old('frais_inscription')}}">
                                        @error('frais_inscription')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Frais mansuel</label>
                                        <input type="text" name="frais_mansuel" class="form-control" value="{{old('duree_formation')}}">
                                        @error('duree_formation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label>Frais d'examen</label>
                                        <input type="text" name="frais_examen" class="form-control" value="{{old('frais_examen')}}">
                                        @error('frais_examen')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Frais de diplôme</label>
                                        <input type="text" name="frais_diplome" class="form-control" value="{{old('frais_diplome')}}">
                                        @error('frais_diplome')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Date crèation :</label>
                                        <input type="date" name="date_creation" class="form-control" value="{{old('date_creation')}}">
                                        @error('date_creation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>N° d'autorisation:</label>
                                        <input type="text" name="num_autorisation" class="form-control" value="{{old('num_autorisation')}}">
                                        @error('num_autorisation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Date qualification :</label>
                                        <input type="date" name="date_qualification" class="form-control" value="{{old('date_qualification')}}">
                                        @error('date_qualification')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>N° de qualification :</label>
                                        <input type="text" name="num_qualification" class="form-control" value="{{old('num_qualification')}}">
                                        @error('num_qualification')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label> Date accréditation:</label>
                                        <input type="date" name="date_accreditation" class="form-control" value="{{old('date_accreditation')}}">
                                        @error('date_accreditation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>N° accréditation:</label>
                                        <input type="text" name="num_accreditation" class="form-control" value="{{old('num_accreditation')}}">
                                        @error('num_accreditation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Enregistrer la Filières <i
                                        class="fe fe-save "></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
