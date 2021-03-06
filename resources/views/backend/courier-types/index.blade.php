@extends('layouts.backend.app')

@push('cssUS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-safe icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                    Vehicle & Route Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.vehicle-routes.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fa fa-plus-square"></i>
                    Add Vehicle & Route
                </a>
            </div>
        </div>
    </div>

    <div class="tabs-animation">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Vehicle Service
                    </div>
                    <div class="table-responsive">
                        <table
                            id="datatable"   class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Identification Number</th>
                                <th class="text-center">Registration Number</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Assigned Route</th>
                                <th class="text-center">Courier Service Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($couriers as $key=> $courier)
                                <tr>
                                    <td class="text-center text-muted">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $courier->courier_type_name }}</td>
                                    <td class="text-center">{{ $courier->registration_number }}</td>
                                    <td class="text-center">{{ $courier->year }}</td>
                                    <td class="text-center">{{ $courier->condition }}</td>
                                    <td class="text-center">{{ $courier->route }}</td>
                                    <td class="text-center">{{ $courier->created_at->diffForHumans() }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('app.vehicle-routes.edit', $courier->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
                                        @if(!($courier->deletable ==true))
                                            <button type="button" onclick="deleteData({{ $courier->id }})"
                                                    class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>
                                            <form id="delete-form-{{ $courier->id }}"
                                                  action="{{ route('app.vehicle-routes.destroy', $courier->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE ')
                                            </form>
                                        @endif
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
@endsection

@push('jsUS')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush
