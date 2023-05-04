
@extends('layouts.index')



@section('content')
<div class="content container-fluid">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 2em" >
        <strong>
            
            <i class="fe fe-thumbs-up" style="font-size: 2em" data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-thumbs-up" aria-label="fe fe-thumbs-up"></i>
        </strong> {{session('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   @endif
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
                    <form action="{{route('utilisateurs.create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="login" value="{{old('login')}}">
                                    @error('login')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                             
                                
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="text" class="form-control" name="pwd" value="{{old('pwd')}}">
                                    @error('pwd')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select" name="role" >
                                        <option value="">Select Country</option>
                                        <option value="secretaire" @selected(old('role') == 'secretaire')>Secrétaire</option>
                                        <option value="directeur"  @selected(old('role') == 'directeur')>Directeur</option>
                                     
                                    </select>
                                    @error('role')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
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


 
 
    
 

 
