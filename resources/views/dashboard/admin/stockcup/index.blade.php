@extends('dashboard.admin.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4 class="bg-primary text-white p-2">Stock Cups</h4>
            <table class="table col-md-9 m-auto" id="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">QTy</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total_Cup</th>
                        <th scope="col">Total_Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($stockCups->count() > 0)
                        @foreach ($stockCups as $index => $item)
                            <tr>
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ "$" . ' ' . $item->price }}</td>
                                <td>{{ $item->total_cup }}
                                    @if ($item->total_cup < 100)
                                        <div
                                            style="display: inline; background: red; color: seashell; padding: 0px 10px; margin-left: 10px; border-radius: 30%;">
                                            <label>Refill Stock</label>
                                        </div>
                                    @else
                                        <div
                                            style="display: inline; background: rgb(0, 17, 255); color: seashell; padding: 0px 10px; margin-left: 10px; border-radius: 30%;">
                                            <label>In Stock</label>
                                        </div>

                                    @endif
                                </td>
                                <td>{{ "$" . ' ' . $item->total_price }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="{{ route('admin.stockCup.edit', $item->id) }}"><i
                                            class="far fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger" style="border: none; background: none"
                                        onclick="deleteType({{ $item->id }})">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                    <form id="delete-from-{{ $item->id }}"
                                        action="{{ route('admin.stockCup.destroy', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>


                        @endforeach

                    @else
                        <tr>
                            <td colspan="4">
                                <h1>No data</h1>
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
