@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-rocket icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                    @role('admin')
                    Admin Dashboard ( Hi, {{ Auth::user()->name }}  )
                    @else
                        Dashboard
                    @endrole
                    <div class="page-title-subheading">
                       You are the rockstar for our system!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tabs-animation">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-night-fade">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Booking Orders</div>
                            <div class="widget-subheading">Only Approved Order</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <span>{{ \App\Models\ShipForMe::where('status_id','=','1')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Admin</div>
                            <div class="widget-subheading">
                                Admin Count
                            </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <span>{{ \App\Models\User::where('role_id','=','1')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-happy-green">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Users</div>
                            <div class="widget-subheading">Only Role Based </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <span>{{ \App\Models\User::where('role_id','=','3')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                    BookForMe - Performance Report
                </div>

            </div>
            <div class="no-gutters row">
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                            <i class="pe-7s-plugin text-white opacity-8"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading"> Pending Orders</div>
                            <div class="widget-numbers">{{ \App\Models\ShipForMe::where('status_id','=','3')->count() }} Order</div>

                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                            <i class="pe-7s-plugin text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Rejected Order</div>
                            <div class="widget-numbers"><span>{{ \App\Models\ShipForMe::where('status_id', '=', '2')->count() }} Order</span></div>

                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                            <i class="pe-7s-plugin text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Accepted Order</div>
                            <div class="widget-numbers"><span>{{ \App\Models\ShipForMe::where('status_id', '=', '1')->count() }} Order</span></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center d-block p-3 card-footer">
                <a href="{{ url('app/shipforme-orders') }}" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                    <span class="mr-1">View Complete Report</span>
                </a>
            </div>
        </div>
    </div>
@endsection
