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
                    <form action="{{ route('app.driver-info.update', $drivers->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input id="name" type="text" class="form-control"
                                       name="name" value="{{ $drivers->name ??  old('name') }}">
                                <input type="hidden" name="driver_id"  value="{{ $drivers->id }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input id="name" type="text" class="form-control"
                                       name="phone" value="{{ $drivers->phone ??  old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Joining Date</label>
                                <input id="name" type="date" class="form-control"
                                       name="joining_date" value="{{ $drivers->joining_date ??  old('joining_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">NID</label>
                                <input id="name" type="text" class="form-control"
                                       name="nid" value="{{ $drivers->nid ??  old('nid') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Driving License</label>
                                <input id="name" type="text" class="form-control"
                                       name="driving_id" value="{{ $drivers->driving_id ??  old('driving_id') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Driving Validity</label>
                                <input id="name" type="date" class="form-control"
                                       name="driving_validity" value="{{ $drivers->driving_validity ??  old('driving_validity') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Driver Address</label>
                                <input id="name" type="text" class="form-control"
                                       name="driver_address" value="{{ $drivers->driver_address ??  old('driver_address') }}">
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
