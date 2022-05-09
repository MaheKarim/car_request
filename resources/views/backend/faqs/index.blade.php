@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    @endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-comment icon-gradient bg-ripe-malin"></i>
                </div>
                <div>
                   Bus Schedule FAQ's Management
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.faq-system.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fa fa-plus-square"></i>
                  Add Bus Schedule
                </a>
            </div>
        </div>
    </div>

    <div class="tabs-animation">

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Schedule List For Bus
                    </div>
                    <div class="table-responsive">
                        <table
                         id="datatable"   class="align-middle mb-0 table table-borderless table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Identification Number</th>
                                <th class="text-center">1st Slot</th>
                                <th class="text-center">2nd Slot</th>
                                <th class="text-center">3rd Slot</th>
                                <th class="text-center">4th Slot</th>
                                <th class="text-center">5th Slot</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $key => $faq)
                            <tr>
                                <td class="text-center text-muted">{{ $key+1 }}</td>
                                <td class="text-center">{{ $faq->vehicle->courier_type_name }} / Reg Number: {{ $faq->vehicle->registration_number }} </td>
                                <td class="text-center">{{ $faq->first_slot }}</td>
                                <td class="text-center">{{ $faq->sec_slot }}</td>
                                <td class="text-center">{{ $faq->third_slot }}</td>
                                <td class="text-center">{{ $faq->fourth_slot }}</td>
                                <td class="text-center">{{ $faq->fifth_slot }}</td>
                                <td class="text-center">{{ $faq->updated_at->diffForHumans() }}</td>

                                <td class="text-center">
                                    <a href="{{ route('app.faq-system.edit', $faq->id) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                        <button type="button" onclick="deleteData({{ $faq->id }})"
                                                class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Delete</span>
                                        </button>
                                        <form id="delete-form-{{$faq->id}}"
                                              action="{{ route('app.faq-system.destroy', $faq->id) }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE ')
                                        </form>

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

@push('js')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
@endpush
