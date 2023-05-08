@extends('layouts.index')

@section('content')
    <div class="content container-fluid">


        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Les matières non programmées
                    </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('programmes.index') }}">Programmes</a>
                        </li>
                        <li class="breadcrumb-item active">Nouveau Programmes</li>
                    </ul>
                </div>
                {{-- <div class="col-auto">
                <a href="{{ route('programmes.create') }}" class="btn btn-primary me-1">
                <i class='bx bxs-user-plus'></i>
                    <!-- <i class="fas fa-plus"></i>fe fe-user-plus -->
                </a>
                <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                    <i class="fas fa-filter"></i>
                </a>    
            </div> --}}
            </div>
        </div>
        <!-- <h5 class="text-center">Filière : TSGE    Année Scolaire : 2022/2023</h5> -->

        <form action="{{ route('programmes.store') }}" method="post">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table style="width:400px">
                        <tr>
                            <td>  <h4> Filière : </h4></td>
                            <td><h4> {{$filiere['nom']}}   </h4></td>
                            <input type="hidden" name="id_filiere" value="{{$filiere['id']}}">
                        </tr>
                        <tr>
                            <td> <h4> Année Scolaire :</h4></td>
                            <td> <h4> {{$annee_scolaire}}</h4></td>
                            <input type="hidden" name="annee_scolaire" value="{{$annee_scolaire}}">

                        </tr>
                    </table>
            
                </div>
            </div>
        </div>

            @csrf
        <div class="row shadow p-3 mb-5 bg-body rounded">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable text-center" style="font-size:10px">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="font-size:14px">ID</th>
                                        <th style="font-size:14px">Nom</th>
                                        <th style="font-size:14px">Nombre d'heure</th>
                                        <th style="font-size:14px">TP</th>
                                        <th style="font-size:14px">TH</th>
                                        <th style="font-size:14px">Programmée</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matieres as $item) 
                                        <tr>
    
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nom}}</td>
                                            <td>{{$item->nombre_heure_total}}</td>
                                            <td>{{$item->nombre_heure_tp}}</td>
                                            <td>{{$item->nombre_heure_th}}</td>
                                            <td>
                                                <input type="radio" name="class[{{$item->id}}]" value="non" checked>
                                                <label for="">Non</label>
                                                <input type="radio"  name="class[{{$item->id}}]" value="1 ere Année">
                                                <label for="">En 1ère Année</label>
                                                <input type="radio" name="class[{{$item->id}}]" value="2 ere Année">
                                                <label for="">En 2ème Année</label>
                                            </td>
    
    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Enregistrer <i class="fe fe-save "></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
