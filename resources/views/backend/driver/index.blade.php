@extends('layouts.backend.app')

@push('cssUS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                    Driver Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.driver-info.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fa fa-plus-square"></i>
                    Add Driver
                </a>
            </div>
        </div>
    </div>

    <div class="tabs-animation">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Driver
                    </div>
                    <div class="table-responsive">
                        <table id="datatable"  class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Joining Date</th>
                                <th class="text-center">NID</th>
                                <th class="text-center">License</th>
                                <th class="text-center">License Validity</th>
                                <th class="text-center">Driver Address</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $key=> $status)
                                <tr>
                                    <td class="text-center text-muted">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $status->name }}</td>
                                    <td class="text-center">{{ $status->phone }}</td>
                                    <td class="text-center">{{ $status->joining_date }}</td>
                                    <td class="text-center">{{ $status->nid }}</td>
                                    <td class="text-center">{{ $status->driving_id }}</td>
                                    <td class="text-center">{{ $status->driving_validity }}</td>
                                    <td class="text-center">{{ $status->driver_address }}</td>
                                    <td class="text-center">{{ $status->updated_at->diffForHumans() }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('app.driver-info.edit', $status->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
{{--                                        @if($status->deletable == false)--}}
{{--                                            <button type="button" onclick="deleteData({{ $status->id }})"--}}
{{--                                                    class="btn btn-danger btn-sm">--}}
{{--                                                <i class="fas fa-trash-alt"></i>--}}
{{--                                                <span>Delete</span>--}}
{{--                                            </button>--}}
{{--                                            <form id="delete-form-{{$status->id}}"--}}
{{--                                                  action="{{ route('app.driver-info.destroy', $status->id) }}" method="POST"--}}
{{--                                                  style="display: none;">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE ')--}}
{{--                                            </form>--}}
{{--                                        @endif--}}
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
