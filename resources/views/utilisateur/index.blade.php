
@extends('layouts.index')

@section('content')
<div class="content container-fluid">
   
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Utilisateurs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Utilisateurs</li>
                </ul>
            </div>
            <div class="col-auto">
                <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary me-1">
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

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID </th>
                                    <th>Login</th>
                                     <th>ROLE</th>
                                    <th>Email</th>
                                     <th class="text-end">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                          
                                     
                                @foreach ($users as $item)
                                <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->login}}</td>
                                <td>{{$item->role}}</td>
                                <td>{{$item->email}}</td>
                                <td >
                                        

                                    <abbr title="Modifier">
                                        <a href="{{ route('utilisateurs.edit', $item->id)}}"
                                            class="btn btn-sm btn-white text-success me-2">
                                            <i class="far fa-edit me-1"></i>
                                            <!-- <i class="far fa-edit me-1"></i> Modifier -->
                                        </a>
                                    </abbr>
                                    <!-- {{ route('utilisateurs.delete', $item->id)}} -->

                                    <abbr title="Supprimer">
                                        <a href=" {{ route('utilisateurs.delete', $item->id)}}"  onclick="return confirm('etes vous sur voulez vous supprimer cet utilisateur ?')"
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

        @if (session('success') == "add")
             <button type="button" data-content="utilisateur" class="btn btn-outline-info mr-1 mb-1 d-none" id="fast-duration">Stagiaire ajouter</button>
                {{session('success')}}
        @elseif (session('success')== "del")
                <button type="button"  data-content="utilisateur" class="btn btn-outline-info mr-1 mb-1 d-none" id="timeout">Timeout 5s</button>
        @elseif (session('success') == "edit")
            <button type="button"   data-content="utilisateur"  class="btn btn-outline-info mr-1 mb-1 d-none" id="sticky">Sticky Toast</button>

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