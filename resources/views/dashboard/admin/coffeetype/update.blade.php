@extends('dashboard.admin.master')
@section('content')
    <div class="container mt-5 ">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4>Upate Cup Price And Size</h4>
            <form action="{{ route('admin.updatecoftype', $coftype) }}" method="POST">
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
                        <option value="small" {{ $coftype->name === 'Ice' ? 'Selected' : '' }}>Ice</option>
                        <option value="medium" {{ $coftype->name === 'Frappe' ? 'Selected' : '' }}>Frappe</option>
                        <option value="large" {{ $coftype->name === 'Hot' ? 'Selected' : '' }}>Hot</option>
                    </select>
                </div>
                <div class="mb-3 col-9">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $coftype->price }}">
                    <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3 col-9">
                        <a class="btn mt-3" href="{{ route('admin.readcoftype') }}">
                            <i class="fas fa-arrow-left"></i>
                            <span>BACK</span>
                        </a>

                        <button type="submit" name="save" class="btn btn-primary mt-3 float-end">Save</button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
