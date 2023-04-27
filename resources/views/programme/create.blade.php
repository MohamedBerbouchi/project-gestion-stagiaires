
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
                                    <th style="font-size:14px" >TH</th>
                                    <th style="font-size:14px" >Programmée</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    
                                    <td>$1</td>
                                    <td>$295</td>
                                    <td>16 Nov 2020</td>
                                    <td>16 Nov 2020</td>
                                    <td>16 Nov 2020</td>
                                    <td>
                                        <input type="radio" name="a" id="">
                                        <label for="">Non</label>
                                        <input type="radio" name="a" id="">
                                        <label for="">En 1ère Année</label>
                                        <input type="radio" name="a" id="">
                                        <label for="">En 2ème Année</label>
                                    </td>

                                   
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">filière <i class="fe fe-save "></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection