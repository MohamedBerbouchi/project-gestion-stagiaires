
@extends('layouts.index')

@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Stagiaires</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Stagiaires</li>
                </ul>
            </div>
            <div class="col-auto">
                <a href="{{ route('stagiaires.create') }}" class="btn btn-primary me-1">
                <i class='bx bxs-user-plus'></i>
                    <!-- <i class="fas fa-plus"></i>fe fe-user-plus -->
                </a>
                <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                    <i class="fas fa-filter"></i>
                </a>
            </div>
        </div>
    </div>


    <div id="filter_inputs" class="card filter-card">
        <div class="card-body pb-0">
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

    <div class="row shadow p-3 mb-5 bg-body rounded">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable text-center" style="font-size:10px">
                            <thead class="thead-light">
                                <tr>
                                    <th style="font-size:14px">Id</th>
                                    <th style="font-size:14px">Nom</th>
                                    <th style="font-size:14px">Année scolaire</th>
                                    <th style="font-size:14px">Filière</th>
                                    <th style="font-size:14px" >Classe</th>
                                    <th style="font-size:14px" >Resultat</th>
                                    <th style="font-size:14px" >Photo</th>
                                    <th style="font-size:14px" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                        @foreach ($stagiaire as $item)

                            <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nom}}</td>
                                    <td>{{$item->scolarite->annee_scolaire}}</td>
                                    <td>{{$item->scolarite->filiere->nom}}</td>
                                    <td>{{$item->scolarite->classe}}</td>
                                    <td>{{$item->scolarite->resultat}}</td>
                                    
                             

                                    <td> <img width="50" src="images/{{$item->photo}}"></td>

                                    <td >
                                        <abbr title="Modifier">
                                            <a href="{{ route('stagiaires.edit', $item->id)}}"
                                                class="btn btn-sm btn-white text-success me-2">
                                                <i class="far fa-edit me-1"></i>
                                                <!-- <i class="far fa-edit me-1"></i> Modifier -->
                                            </a>
                                        </abbr>
                                        <abbr title="Afficher">
                                            <a href="{{ route('stagiaires.show',$item->id)}}"
                                                class="btn btn-sm btn-white text-primary  me-2">
                                                <i class="far fa-eye me-1"></i>
                                                <!-- <i class="far fa-eye me-1"></i> Afficher -->
                                            </a>
                                        </abbr>
                                        <abbr title="Imprimer">
                                            <a href="{{ route('stagiaires.impression',$item->id)}}"
                                                class="btn btn-sm btn-white text-primary  me-2">
                                                <i class="fe fe-printer "></i>
                                                <!-- <i class="fe fe-printer "></i> Imprimer -->
                                            </a>
                                        </abbr>
                                        <!-- {{ route('stagiaires.delete', 1)}} -->
                                        <abbr title="Supprimer">
                                            <a href="#" 
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
@if (session('success') )
                <button type="button" class="btn btn-outline-info mr-1 mb-1 d-none" id="fast-duration">Show .5s</button>
@endif
 
 <script>
    window.onload = function() {
        @if (session('success') )
        document.getElementById("fast-duration").click();
        @endif
    };
</script>
@endsection