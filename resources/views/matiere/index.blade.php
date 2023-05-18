
@extends('layouts.index')

@section('content')
<div class="content container-fluid">
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
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Matieres</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Matieres</li>
                </ul>
            </div>
            <div class="col-auto">
                <a href="{{ route('matieres.create') }}" class="btn btn-primary me-1">
                    <i class="fas fa-plus"></i>
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
                        <input type="text"  class="form-control">
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

    <div class="row">
    
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable text-center">
                            <thead class="thead-light">

                                <tr>
                                    <th>ID Matiere</th>
                                    <th>Nom</th>
                                    <th>Nombre heure</th>
                                    <th>TP</th>
                                    <th>TH</th>
                                    <th class="text-end">Coeff</th>
                                    <th class="text-end">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($matieres as $item)
                                <tr>
                                    
                                  
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->nom}}</td>
                                    <td>{{ $item->nombre_heure_total}}</td>
                                    <td>{{ $item->nombre_heure_tp}}</td>
                                    <td>{{ $item->nombre_heure_th}}</td>

                                    <td>{{ $item->coef}}</td>
                                    <td >
                                        

                                        <abbr title="Modifier">
                                            <a href="{{ route('matieres.edit',  $item->id)}}"
                                                class="btn btn-sm btn-white text-success me-2">
                                                <i class="far fa-edit me-1"></i>
                                            </a>
                                        </abbr>

                                        <abbr title="Supprimer">
                                            <a href="{{ route('matieres.delete',  $item->id)}}" class="btn btn-sm btn-white text-danger me-2" id="confirm-text" onclick="return confirm('are you sure ?')">
                                                <i class="far fa-trash-alt me-1" ></i>
                                            </a>
                                        </abbr>
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











