@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                  Bus Schedule FAQ'S Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.faq-system.index') }}" class="btn-shadow mr-3 btn btn-danger">
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
                    <form action="{{  route('app.faq-system.update', $faq->id) }}"
                          method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label>Select Any Running Condition Bus</label>
                                <select name="vehicle_id" class="form-control select">
                                    @php($statuss= \App\Models\CourierType::all())
                                    @foreach ($statuss as $status)
                                        <option {{ ($faq->vehicle_id == $status->id) ? 'selected' : '' }} value="{{ $status->id }}">{{$status->courier_type_name}} ( Reg. Number: {{$status->registration_number}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="faq_ques">1st Slot</label>
                                <input id="faq_ques" type="time" class="form-control"
                                       name="first_slot" value="{{ $faq->first_slot ??  old('first_slot') }}">
                            </div>
                            <div class="form-group">
                                <label for="faq_ques">2nd Slot</label>
                                <input id="faq_ques" type="time" class="form-control"
                                       name="sec_slot" value="{{ $faq->sec_slot ??  old('sec_slot') }}">
                            </div>
                            <div class="form-group">
                                <label for="faq_ques">3rd Slot</label>
                                <input id="faq_ques" type="time" class="form-control"
                                       name="third_slot" value="{{ $faq->third_slot ??  old('third_slot') }}">
                            </div>
                            <div class="form-group">
                                <label for="faq_ques">4th Slot</label>
                                <input id="faq_ques" type="time" class="form-control"
                                       name="fourth_slot" value="{{ $faq->fourth_slot ??  old('fourth_slot') }}">
                            </div>
                            <div class="form-group">
                                <label for="faq_ques">5th Slot</label>
                                <input id="faq_ques" type="time" class="form-control"
                                       name="fifth_slot" value="{{ $faq->fifth_slot ??  old('fifth_slot') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                    Update
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
