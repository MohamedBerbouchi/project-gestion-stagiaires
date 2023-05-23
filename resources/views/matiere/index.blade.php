
@extends('layouts.index')

@section('content')
<div class="content container-fluid">

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
                                    @if ($userRole == "Directeur")
                                    <th class="text-end">Action</th>
                                    @endif

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
                                    @if ($userRole == "Directeur")
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
                                    @endif
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

        @if (session('success') == "add")
             <button type="button" data-content="matiere" class="btn btn-outline-info mr-1 mb-1 d-none" id="fast-duration">Stagiaire ajouter</button>
                {{session('success')}}
        @elseif (session('success')== "del")
                <button type="button"  data-content="matiere" class="btn btn-outline-info mr-1 mb-1 d-none" id="timeout">Timeout 5s</button>
        @elseif (session('success') == "edit")
            <button type="button"   data-content="matiere"  class="btn btn-outline-info mr-1 mb-1 d-none" id="sticky">Sticky Toast</button>

        @endif
               
@endif
 
 <script>
    window.onload = function() {
        @if (session('success') && session('success') == "add")
            document.getElementById("fast-duration").click();
        @elseif (session('success') && session('success') == "del")
             document.getElementById("timeout").click();
        @elseif (session('success') && session('success')== "edit" )
             document.getElementById("sticky").click();
        @endif
    };
</script>
@endsection











