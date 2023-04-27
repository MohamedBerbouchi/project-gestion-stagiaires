
@extends('layouts.index')

@section('content')
<div class="content container-fluid">

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
                            <tr>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="60021209010e0a0f080e130f0e200518010d100c054e030f0d">ayoub moustakim</a>
                                    </td>
                                    <td>$295</td>
                                    <td>16 Nov 2020</td>
                                    <td>16 Nov 2020</td>
                                    <td>16 Nov 2020</td>
                                    <td>16 Nov 2020</td>

                                    <td><span class="badge badge-pill bg-success-light">Active</span></td>
                                    <td >
                                        <abbr title="Modifier">
                                            <a href="{{ route('filieres.edit', 1)}}"
                                                class="btn btn-sm btn-white text-success me-2">
                                                <i class="far fa-edit me-1"></i>
                                                <!-- <i class="far fa-edit me-1"></i> Modifier -->
                                            </a>
                                        </abbr>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection