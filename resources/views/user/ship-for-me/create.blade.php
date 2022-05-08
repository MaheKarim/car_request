@extends('layouts.user.app')

@push('wizard')
    <style>

        .form-section{
            padding-left: 15px;
            /*display: none;*/
        }
        .form-section.current{
            display: inherit;
        }
        a ,  .btn-success{
            margin-top: 10px;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
@endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Booking Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

                    <a href="{{ route('user.dashboard.index') }}" class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-arrow-circle-left fa-w-20"></i>
                        </span>
                        {{ __('Back to list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="main-card mb-3 card">
                <div class="card-border card card-body border-primary">
                    <h5 class="card-title">Our US Address</h5>
                    {{ $usaddresses->house_number }} <br>
                    {{ $usaddresses->street_number }} <br>
                    {{ $usaddresses->state_name }} <br>
                    {{ $usaddresses->postal_code }} <br>
                    {{ $usaddresses->telephone_number }}
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container">
             <div class="card">
                 <div class="card-header text-white bg-info">
                     <h4>Book My Vehicle</h4>
                 </div>
                 <div class="card-body">
                     <form class="contact-form" method="POST" action="{{ route('user.BookForMe.store') }}">
                         @csrf
                         <div class="form-section">
                             <!-- error message -->
                             @if ($errors->any())
                                 <div class="alert alert-danger">
                                     <ul>
                                         @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                         @endforeach
                                     </ul>
                                 </div>
                         @endif
                         <!-- error message end -->
                             <label for="product_name">Name</label>
                             <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required>

                             @error('product_name')
                             <div class="alert alert-danger">{{ $message }}</div>
                             @enderror

                             <label for="product_link">Department</label>
                             <input type="text" name="product_link" class="form-control" value="{{ old('') }}">

                             <label for="vehicle_type">Vehicle Type</label>
                             <input type="text" name="vehicle_type" class="form-control" value="{{ old('vehicle_type') }}" placeholder="Car or Bus">

                             <label for="journey_start_date">Journey Start Date</label>
                             <input type="datetime-local" name="journey_start_date" class="form-control @error('journey_start_date') is-invalid @enderror" value="{{ old('journey_start_date') }}" required>

                             @error('journey_start_date')
                             <div class="alert alert-danger">{{ $message }}</div>
                             @enderror

                             <label for="journey_end_date">Journey End Date</label>
                             <input type="datetime-local" name="journey_end_date" class="form-control @error('journey_end_date') is-invalid @enderror" value="{{ old('journey_end_date') }}" required>

                             @error('journey_end_date')
                             <div class="alert alert-danger">{{ $message }}</div>
                             @enderror

                         </div>
                            <br>
                         <div class="form-section">

                             <label for="recvr_mail">Destination</label>
                             <input type="text" name="recvr_destination" class="form-control" value="{{ old('recvr_destination') }}">

                             <label for="pickup_point">Pickup Point</label>
                             <input type="text" name="pickup_point" class="form-control" value="{{ old('pickup_point') }}">

                             <label for="reason_for_booking">Reason For Booking</label>
                             <input type="text" name="reason_for_booking" class="form-control" required value="{{ old('reason_for_booking') }}">

                             <label for="recvr_address">Full Address</label>
                             <textarea  name="recvr_address" class="form-control" required> </textarea>

                             <label for="recvr_mail">Email</label>
                             <input type="text" name="recvr_mail" class="form-control" value="{{ old('recvr_mail') }}">

                             <label for="recvr_phn_number1">Phone Number</label>
                             <input type="text" name="recvr_phn_number1" class="form-control @error('product_quantity') is-invalid @enderror" value="{{ old('recvr_phn_number1') }}" required>
                             @error('recvr_phn_number1')
                             <div class="alert alert-danger">{{ $message }}</div>
                             @enderror

                         </div>

                         <div class="form-navigation">
                             <a href="{{ url('user/dashboard') }}" type="button" class="previous btn btn-danger float-left">Cancel</a>
                             <button type="submit" class="next btn btn-success float-right">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
            </div>
        </div>
    </div>
@endsection

