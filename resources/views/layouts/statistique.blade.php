@extends('layouts.index')


@section('title')
<title>Statistiqus</title>
@endsection

@section('content')
<div class="content container-fluid">
    <h1>Statistiqus de l'année scolaire {{$anne_scolaire_actual}}</h1>
    <div class="row p-3">



    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-dollar-sign"></i>
                                        <!-- <i class="fa-light fa-user-group-simple"></i> -->
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Efectif 1ère et 2è Année</div>
                                        <div class="dash-counts">
                                            <p>{{$anne1 + $anne2}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 4%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!-- <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                    class="fas fa-arrow-down me-1"></i>1.15%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Efectif 1ère Année</div>
                                        <div class="dash-counts">
                                            <p>{{$anne1}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 3%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                    class="fas fa-arrow-up me-1"></i>2.37%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Efectif 2è Année</div>
                                        <div class="dash-counts">
                                            <p>{{ $anne2}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 1%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                            class="fas fa-arrow-up me-1"></i>3.77%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>
                    
 

    </div>
    <div class="row">
        <div class="col-xl-7 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Statistiqus de l'année scolaire {{$anne_scolaire_actual}}</h5>
                         
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
                        
                    </div>
                       {{-- this is the code fo charts --}}

                    <div id="sales_chart" data-homme="{{$homme}}" data-femme="{{$femme}}" data-year='{{$years}}'></div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 d-flex">
            <div class="card flex-fill" >
                <div class="card-header" >
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Statistiqus de l'année scolaire {{$anne_scolaire_actual}}</h5>
                        
                    </div>
                </div>
                <div class="card-body">
                       {{-- this is the code fo charts --}}
                       <div id="invoice_chart"></div> 
                    <div class="text-center text-muted">
                        <div class="row">
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
</div>
@endsection