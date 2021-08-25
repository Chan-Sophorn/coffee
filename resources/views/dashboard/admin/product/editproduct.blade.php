@extends('dashboard.admin.master')
@section('title', 'Product')
@section('content')

    <div class="container">
        <div class="col-md-10 m-auto">
            <div class="container">
                <p class="h3 mt-3">From Update Product</p>
            </div>
            <form action="{{ route('admin.product.update', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                        value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="type" class="col-md-4 col-form-label col-form-label-sm">Type</label>
                    <select id="type" name="type" class="form-select bg-input" value="{{ $product->type }}">
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
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price"
                        value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <a class="btn mt-3" href="{{ route('admin.product.index') }}">
                        <i class="fas fa-arrow-left"></i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" name="save" class="btn btn-primary mt-3 float-end">Save</button>
                </div>
            </form>
        </div>

    </div>




@endsection
