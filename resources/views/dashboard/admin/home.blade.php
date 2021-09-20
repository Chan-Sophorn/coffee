@extends('dashboard.admin.master')
@push('css')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"> --}}
@endpush
@section('title', 'Report')
@section('content')
    <div class="container mt-5">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4 class="bg-primary text-white p-2">Coffee Report</h4>

            <form class="form-inline" action="{{ route('admin.search') }}" method="POST"
                style="margin: 20px; margin-bottom: 30px;">
                @csrf
                <div class="row">
                    <div class=" col-4 form-group">
                        <label for="startDate">From Date:</label>
                        <input type="date" class="form-control" id="" name="startDate">
                    </div>
                    <div class=" col-4 form-group">
                        <label for="endDate">To Date:</label>
                        <input type="date" class="form-control" id="" name="endDate">
                    </div>
                    <div class=" col-1 form-group">
                        <label for=""></label>
                        <button type="submit" class="form-control"><i class="fas fa-search"></i></button>
                    </div>

                </div>

            </form>

            <table class="table col-md-9 m-auto" id="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->CoffeeName->name }}</td>
                            <td>{{ $value->CoffeeType->name }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ $value->total . '$' }}</td>
                            <td>{{ $value->date }}</td>
                            <td>
                                {{-- <a href=""><i class="far fa-edit"></i></a> --}}

                                <button type="button" class="btn btn-danger" style="border: none; background: none"
                                    onclick="deleteType({{ $value->id }})">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                                <form id="delete-from-{{ $value->id }}" action="{{ route('admin.del', $value->id) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- Datatable with button pdf --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>


    <script !src="">
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script type="text/javascript">
        function deleteType(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('delete-from-' + id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
