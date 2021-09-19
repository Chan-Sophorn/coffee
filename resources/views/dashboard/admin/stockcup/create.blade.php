@extends('dashboard.admin.master')
@section('content')
    <div class="container mt-5 ">
        <div class="row">
            <h4>Add Cup To Stock</h4>
            <form action="{{ route('admin.stockCup.store') }}" method="POST">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="mb-3 col-9">
                    <label for="name" class="form-label">Name</label>
                    <select class="form-select bg-input" name="name" id="name">
                        <option value="small">small</option>
                        <option value="medium">medium</option>
                        <option value="large">large</option>
                    </select>
                </div>
                <div class="mb-3 col-9">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="text" class="form-control" id="qty" name="qty" value="{{ old('qty') }}">
                    <span class="text-danger">@error('qty'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3 col-9">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        @endsection
