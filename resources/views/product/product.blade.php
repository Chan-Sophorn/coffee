@extends('admin.master')
@section('title','Product')
@section('contentadmin')

    <div class="container">

        <div class="col-md-12 mt-3">
            <a class="btn btn-primary" href="{{route('product.create')}}">Add Product</a>
        </div>
        <div class="container con-table mt-3">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($products as $item)
                         <tr>
                             <th scope="row">{{$item->id}}</th>
                             <td>{{$item->name}}</td>
                             <td>{{$item->type}}</td>
                             <td>{{$item->size}}</td>
                             <td>{{$item->price . "$"}}</td>
                             <td>
                                 <a href="{{route('product.edit',$item->id)}}"><i class="far fa-edit "></i></a>
                                 <form action="{{ route('product.destroy',$item->id) }}" method="POST" style="display: inline-block">
                                     @csrf
                                     @method('DELETE')
                                     <a href=""><i class="fas fa-trash text-danger"></i></a>

                                 </form>
                             </td>
                         </tr>

                     @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection

@push('js')

    <script src="{{ asset('assets/backEnd/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deleteCategory(id)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn'
                },
                buttonsStyling: true
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
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-category-'+id).submit();
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