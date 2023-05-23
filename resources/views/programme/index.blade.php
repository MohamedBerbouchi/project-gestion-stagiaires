@extends('layouts.index')


@section('title')
<title>Programme</title>
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Programmes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a>
                        </li>
                        <li class="breadcrumb-item active">Programmes</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="{{ route('programmes.create') }}" class="btn btn-primary me-1">
                        <i class='bx bxs-user-plus'></i>
                        <!-- <i class="fas fa-plus"></i>fe fe-user-plus -->
                    </a>
                    
                </div>
            </div>
        </div>


        <form action="{{ route('programmes.create') }}" method="get">
            @csrf
            <div class="card ">
                <div class="card-body pb-0">
                    
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">

                                @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10;
                                    $years = range($currentYear,$startYear);
                                     
                                @endphp

                              
                                <label>Année scolaire</label>
                                <select class="select" name="annee_scolaire" id="annee_scolaire">
                                    
                                    @foreach ($years as $year)
                                    <option value="{{$year}}-{{$year+1}}">{{ $year }}/{{ $year + 1 }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Filière</label>
                                <select class="select" name="id_filiere" id="id_filiere">
                                    
                                    @foreach ($filieres as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @endforeach

                                </select>
                               
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Classe </label>
                                <select class="select" name="classe" id="classe">
                                    <option value="toutes">Toutes les classes</option>
                                    <option value="1 ere Année">1 ere Année</option>
                                    <option value="2 eme Année">2 eme Année</option>
                                </select>
                                 
                            </div>
                        </div>
                         <div class="col-sm-6 col-md-3" style="display: flex; align-items: center;">
                          <button type="button" onclick="redirectToRoute()"  class="btn btn-primary me-1">
                                <i class='fa fa-search'></i>
                             </button>
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
                                            <th style="font-size:14px">Matière</th>
                                            <th style="font-size:14px">Nombre d'heure</th>
                                            <th style="font-size:14px">Année scolaire</th>
                                            <th style="font-size:14px">TP</th>
                                            <th style="font-size:14px">TH</th>
                                            <th style="font-size:14px">Coeff</th>
                                            <th style="font-size:14px">Classe</th>
                                            <th style="font-size:14px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programmes as $item)
                                            <tr>
                                                 <td>{{ $item->matiere->nom }}</td>
                                                <td>{{ $item->matiere->nombre_heure_total }}</td>
                                                <td>{{ $item->annee_scolaire }}</td>
                                                <td>{{ $item->matiere->nombre_heure_tp }}</td>
                                                <td>{{ $item->matiere->nombre_heure_th }}</td>
                                                <td>{{ $item->matiere->coef }}</td>
                                                <td>{{ $item->classe }}</td>

                                                <td>
                                                    <abbr title="Modifier">
                                                        <a href="{{ route('programmes.edit', $item->matiere->id) }}"
                                                            class="btn btn-sm btn-white text-success me-2">
                                                            <i class="far fa-edit me-1"></i>
                                                            <!-- <i class="far fa-edit me-1"></i> Modifier -->
                                                        </a>
                                                    </abbr>


                                                    <abbr title="Supprimer">
                                                        <a href="{{ route('programmes.delete', $item->id) }}"
                                                            onclick="return confirm('Etes vous sur ?')"
                                                            class="btn btn-sm btn-white text-danger me-2" id="confirm-text">
                                                            <i class="far fa-trash-alt me-1"></i>
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
                                @if ($userRole == "Directeur")

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Ajouter
                                        une matière au programme de cette filière <i class="fe fe-save "></i> </button>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
   
<script>
                                   
  
    function redirectToRoute() {
        
        let id_filiere = document.getElementById("id_filiere").value;
        let annee_scolaire = document.getElementById("annee_scolaire").value;
        let classe = document.getElementById("classe").value;

        
            var url = "{{route('programmes.search', [':value1', ':value2', ':value3']) }}";
            url = url.replace(':value1', id_filiere);
            url = url.replace(':value2', annee_scolaire);
            url = url.replace(':value3', classe);
            window.location.href = url;
       
    }
</script>
@if (session('success') )

        @if (session('success') == "add")
             <button type="button" data-content="programme" class="btn btn-outline-info mr-1 mb-1 d-none" id="fast-duration">Stagiaire ajouter</button>
                {{session('success')}}
        @elseif (session('success')== "del")
                <button type="button"  data-content="programme" class="btn btn-outline-info mr-1 mb-1 d-none" id="timeout">Timeout 5s</button>
        @elseif (session('success') == "edit")
            <button type="button"   data-content="programme"  class="btn btn-outline-info mr-1 mb-1 d-none" id="sticky">Sticky Toast</button>

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

