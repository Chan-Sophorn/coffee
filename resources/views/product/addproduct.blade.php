@extends('admin.master')
@section('title','Product')
@section('contentadmin')

    <div class="container">
        <div class="col-md-10 m-auto">
            <div class="container"><p class="h3 mt-3">From Add Product</p></div>
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>
                <div class="form-group">
                    <label for="type" class="col-md-4 col-form-label col-form-label-sm">Type</label>
                    <select id="type" name="type" class="form-select bg-input">
                        <option selected>Hot</option>
                        <option selected>Ice</option>
                        <option selected>Frappe</option>
                    </select>
                </div>
                <div class="form-group ml-4 mt-3 mb-3">
                    <label for="type" class="col-md-4 col-form-label col-form-label-sm">Size</label>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="size" id="large" value="large">
                        <label class="form-check-label" for="large">large</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" id="meduim" value="meduim">
                        <label class="form-check-label" for="meduim">meduim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="size" id="small" value="small" checked>
                        <label class="form-check-label" for="small">small</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price"  placeholder="Enter Price">
                </div>

                <button type="submit" name="save" class="btn btn-primary mt-3">Save</button>
            </form>
        </div>


    </div>




@endsection