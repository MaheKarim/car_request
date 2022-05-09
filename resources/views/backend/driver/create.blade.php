@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                    {{ isset($drivers) ? 'Edit' : 'Create' }} Driver Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.driver-info.index') }}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fa fa-arrow-circle-left"></i>
                    Back To List
                </a>

            </div>
        </div>
    </div>

    <div class="tabs-animation">

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <form action="{{ route('app.driver-info.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <h5 class="card-title">Driver Information</h5>
                            <div class="form-group">
                                <label for="name">Driver Name</label>
                                <input id="name" type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Driver Phone</label>
                                <input id="phone" type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="name">Joining Date</label>
                                <input id="name" type="date" class="form-control" name="joining_date">
                            </div>
                            <div class="form-group">
                                <label for="nid">Driver NID</label>
                                <input id="name" type="text" class="form-control" name="nid">
                            </div>
                            <div class="form-group">
                                <label for="driving_id">Driver License</label>
                                <input id="name" type="text" class="form-control" name="driving_id">
                            </div>
                            <div class="form-group">
                                <label for="nid">Driver License Validity</label>
                                <input id="name" type="date" class="form-control" name="driving_validity">
                            </div><div class="form-group">
                                <label for="driver_address">Driver Address</label>
                                <input id="driver_address" type="text" class="form-control" name="driver_address">
                            </div>

                            <!-- Div Name End -->

                            <button type="submit" class="btn btn-primary">
                                @isset($drivers)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    Create
                                @endisset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script type="text/javascript">
        // Listen for click on toggle checkbox
        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
