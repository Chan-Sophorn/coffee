@extends('dashboard.admin.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4 class="bg-primary text-white p-2">Data Cups</h4>
            <table class="table col-md-9 m-auto" id="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cups->count() > 0)
                        @foreach ($cups as $index => $item)
                            <tr>
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price . "$" }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $item->id) }}"><i class="far fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger" style="border: none; background: none"
                                        onclick="deleteType({{ $item->id }})">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                    <form id="delete-from-{{ $item->id }}"
                                        action="{{ route('admin.deletecup', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="deletemodel" tabindex="-1" aria-labelledby="deletemodel" --}}
                            {{-- aria-hidden="true"> --}}
                            {{-- <div class="modal-dialog"> --}}
                            {{-- <div class="modal-content"> --}}
                            {{-- <div class="modal-header"> --}}
                            {{-- <h5 class="modal-title text-danger" id="">Delete Record</h5> --}}

                            {{-- </div> --}}
                            {{-- <div class="modal-body"> --}}
                            {{-- Delete, Are you sure ? --}}
                            {{-- </div> --}}
                            {{-- <div class="modal-footer"> --}}
                            {{-- <button type="button" class="btn btn-secondary" --}}
                            {{-- data-bs-dismiss="modal">Close</button> --}}
                            {{-- <form action="{{ route('admin.deletecup', $item->id) }}" method="POST" --}}
                            {{-- style="display: inline-block"> --}}
                            {{-- @csrf --}}
                            {{-- @method('DELETE') --}}
                            {{-- <button type="submit" class="btn btn-danger" --}}
                            {{-- style="border: none;">Delete</button> --}}
                            {{-- </form> --}}

                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                        @endforeach

                    @else
                        <tr>
                            <td>
                                <h3>No data</h3>
                            </td>
                        </tr>

                    @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script !src="">
        $(document).ready(function() {
            $('#table').DataTable();
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
