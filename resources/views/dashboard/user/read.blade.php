@extends('dashboard.admin.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
        integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css"
        integrity="sha512-EzrsULyNzUc4xnMaqTrB4EpGvudqpetxG/WNjCpG6ZyyAGxeB6OBF9o246+mwx3l/9Cn838iLIcrxpPHTiygAA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')
    <div class="container mt-5">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4 class="bg-primary text-white p-2">List User Staff</h4>
            <table class="table col-md-9 m-auto" id="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Allow</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->count() > 0)
                        @foreach ($user as $index => $item)
                            <tr>
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->is_allow == 1)
                                        <div class="form-check form-switch">
                                            <label><input type="checkbox" class="form-check-input"
                                                    id="is_allow{{ $item->id }}" checked=""
                                                    onclick="is_allow({{ $item->id }})"><span
                                                    class="lever switch-col-blue-grey"></span></label>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <label><input type="checkbox" class="form-check-input"
                                                    id="pendding{{ $item->id }}"
                                                    onclick="pendding({{ $item->id }})"><span
                                                    class="lever switch-col-blue-grey"></span></label>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <a href=""><i class="far fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger" style="border: none; background: none"
                                        onclick="deleteType({{ $item->id }})">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                    <form id="delete-from-{{ $item->id }}" action="" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
        integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js"
        integrity="sha512-bAjB1exAvX02w2izu+Oy4J96kEr1WOkG6nRRlCtOSQ0XujDtmAstq5ytbeIxZKuT9G+KzBmNq5d23D6bkGo8Kg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
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
            });
        };
    </script>
    <script>
        function is_allow(userId) {
            var userId = userId;
            var is_allow;
            var is_allow = document.getElementById('is_allow' + userId);

            if (is_allow.checked) {
                is_allow = 1;
            } else {
                is_allow = 0;
            }

            $.ajax({
                url: "{{ route('admin.userStatus') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    userId: userId,
                    is_allow: is_allow,
                },
                success: function(data) {
                    console.log(data);
                    if (data.is_allow == 1) {
                        tostr.success('user can access');
                        Swal.fire(
                            'Open Permission',
                            'Now ' + '<b>' + data.name + '</b>' + ' can access login',
                            'success'
                        )
                    } else {
                        tostr.success('user can access.......');
                        Swal.fire(
                            'Close Permission',
                            'Now ' + '<b>' + data.name + '</b>' + ' can not access login',
                            'success'
                        )
                    }
                }
            });
        }

        function pendding(userId) {
            // alert(userId);
            var userId = userId;
            var is_allow;
            var pendding = document.getElementById('pendding' + userId);
            if (pendding.checked) {
                is_allow = 1;
            } else {
                is_allow = 0;
            }

            // var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin.userStatus') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    userId: userId,
                    is_allow: is_allow,
                },
                success: function(data) {

                    // console.log(data.approved);

                    if (data.is_allow == 1) {
                        tostr.success('user can access');
                        Swal.fire(
                            'Open Permission',
                            'Now ' + '<b>' + data.name + '</b>' + ' can access login',
                            'success'
                        )
                    } else {
                        tostr.success('user can not access.');
                        Swal.fire(
                            'Close Permission',
                            'Now ' + '<b>' + data.name + '</b>' + ' can not access login',
                            'success'
                        )
                    }
                }
            });
        }
    </script>
@endpush
