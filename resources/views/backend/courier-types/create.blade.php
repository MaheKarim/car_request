@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-safe icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                    {{ isset($couriers) ? 'Edit' : 'Create' }} Vehicle & Route Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.vehicle-routes.index') }}" class="btn-shadow mr-3 btn btn-danger">
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
                    <form action="{{ route('app.vehicle-routes.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="courier_type_name">Identification Number</label>
                                <input id="courier_type_name" type="text" class="form-control @error('courier_type_name') is-invalid @enderror"
                                       name="courier_type_name" required autofocus>
                                @error('courier_type_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="registration_number">Registration Number</label>
                                <input id="registration_number" type="text" class="form-control" name="registration_number">

                                <label for="year">Year</label>
                                <input id="year" type="text" class="form-control" name="year" placeholder="2017">

                                <label for="condition">Assign / Condition</label>
                                <input id="year" type="text" class="form-control" name="condition" placeholder="Running or Off">
                                <br>
                                <label for="condition">Assigned Bus Route</label>
                                <textarea type="text" class="form-control" name="route" >{{ $couriers->route ??  old('route') }} </textarea>


                            </div>

                            <!-- Div Name End -->
                            <button type="submit" class="btn btn-primary">
                                @isset($couriers)
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
