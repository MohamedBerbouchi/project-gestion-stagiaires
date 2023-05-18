
@extends('layouts.index')

@section('content')
<div class="content container-fluid">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 1.5em" >
        <strong>
            
            <i class="fe fe-thumbs-up" data-bs-toggle="tooltip" title="" data-bs-original-title="fe fe-thumbs-up" aria-label="fe fe-thumbs-up"></i>
        </strong> {{session('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   @endif
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Filières</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Filières</li>
                </ul>
            </div>
            <div class="col-auto">
                <a href="{{ route('filieres.create') }}" class="btn btn-primary me-1">
                <!-- <i class='bx bxs-user-plus'></i> -->
                    <i class="fas fa-plus"></i>
                </a>
                <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                    <i class="fas fa-filter"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="card ">
        <div class="card-body pb-0">
         <button type="button" class="btn btn-outline-primary mr-1 mb-1 d-none"  id="position-bottom-left">Bottom
Left</button>
            <form action="{{ route('filieres.search') }}" method="post">
            @csrf
            <div class="row">
               
                
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Niveau </label>
                        <select name="niveau_diplome" class="select">
                            <option value="tous">Tous les niveaux</option>
                            <option value="Q">Qualification</option>
                            <option value="T">Technicien</option>
                            <option value="TS">Technicien Spécialisé</option>
                            <option value="FC">Attestation de FC</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Recherche par nom </label>
                        <input type="text" name="nom_diplome" class="form-control"  placeholder="Recherche par nom ...">
                         
                    </div>
                </div>
                 <div class="col-sm-6 col-md-3" style="display: flex; align-items: center;">
                  <button  class="btn btn-primary me-1">
                        <i class='fa fa-search'></i>
                     </button>
                  {{-- <button type="button" onclick="redirectToRoute()"  class="btn btn-primary me-1">
                        <i class='fa fa-search'></i>
                     </button> --}}
                      </div>
                    
            </div>
        </div>
    </form>
    </div>

    <div class="row shadow-lg  mb-5 bg-body rounded">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable text-center" style="font-size:10px">
                            <thead class="thead-light">
                                <tr>
                                <th style="font-size:14px">Id</th>
                                    <th style="font-size:14px">Nom</th>
                                    <th style="font-size:14px">Niveau de diplome</th>
                                    <th style="font-size:14px">Frais D'inscription</th>
                                    <th style="font-size:14px">Frais mensuel</th>
                                    <th style="font-size:14px">Frais d'examen</th>
                                    <th style="font-size:14px">Frais de dipôme</th>
                                    <th style="font-size:14px" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach ($filieres as $item) 
                                <tr>
                                         
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nom}}</td>
                                        <td>{{$item->niveau_diplome}}</td>
                                        <td>{{$item->frais_inscription}}</td>
                                        <td>{{$item->frais_mansuel}}</td>
                                        <td>{{$item->frais_examen}}</td>
    
                                        <td>{{$item->frais_diplome}}</td>
                                        <td >
                                            <abbr title="Modifier">
                                                <a href="{{ route('filieres.edit',$item->id )}}"
                                                    class="btn btn-sm btn-white text-success me-2">
                                                    <i class="far fa-edit me-1"></i>
                                                    <!-- <i class="far fa-edit me-1"></i> Modifier -->
                                                </a>
                                            </abbr>
                                            <abbr title="Supprimer">
                                                <a href="{{ route('filieres.delete',$item->id )}}"  onclick="return confirm('Etes vous sur ?')"
                                                    class="btn btn-sm btn-white text-danger me-2" id="confirm-text">
                                                    <i class="far fa-trash-alt me-1" ></i>
                                                    <!-- <i class="far fa-trash-alt me-1" ></i>Supprimer -->
                                                </a>
                                            </abbr>
                                                    <!-- <button type="button"  class="btn btn-sm btn-white text-danger me-2" id="confirm-text">
                                                    Delete</button> -->
                                        </td>
                                    </tr>
                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
<script>
   
//     function redirectToRoute() {
        
//         let niveau_diplome = document.getElementById("niveau_diplome").value;
//         let nom_diplome = document.getElementById("annee_scolaire").value;

        
//             var url = "{{route('programmes.search', [':value1', ':value2', ':value3']) }}";
//             url = url.replace(':value1', id_filiere);
//             url = url.replace(':value2', annee_scolaire);
//             url = url.replace(':value3', classe);
//             window.location.href = url;
       
//     }
// </script>
@endsection