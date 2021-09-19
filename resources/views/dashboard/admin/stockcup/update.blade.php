@extends('dashboard.admin.master')
@section('content')
    <div class="container mt-5 ">
        <div class="row">
            <h4>Update Straw To Stock</h4>
            <form action="{{ route('admin.stockCup.update', $cups->id) }}" method="POST">
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
                @method('put')
                <div class="mb-3 col-9">
                    <label for="name" class="form-label">Name</label>
                    <select class="form-select bg-input" name="name" id="name">
                        <option value="small" {{ $cups->name === 'small' ? 'Selected' : '' }}>small</option>
                        <option value="medium" {{ $cups->name === 'medium' ? 'Selected' : '' }}>medium</option>
                        <option value="large" {{ $cups->name === 'large' ? 'Selected' : '' }}>large</option>
                    </select>
                </div>
                <div class="mb-3 col-9">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="text" class="form-control" id="qty" name="qty" value="{{ $cups->quantity }}">
                    <span class="text-danger">@error('qty'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3 col-9">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $cups->price }}">
                        <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                        </div>
                        <div class="mb-3 col-9">
                            <a class="btn mt-3" href="{{ route('admin.stockCup.index') }}">
                                <i class="fas fa-arrow-left"></i>
                                <span>BACK</span>
                            </a>

                            <button type="submit" name="save" class="btn btn-primary mt-3 float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
