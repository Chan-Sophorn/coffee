@extends('dashboard.admin.master')
@section('content')
    <div class="container mt-5 ">
        <div class="row" style="padding-left: 70px; padding-right: 70px;">
            <h4>Upate Cup Price And Size</h4>
            <form action="{{ route('admin.updatecup', $cup) }}" method="POST">
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
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cup->name }}">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3 col-9">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $cup->price }}">
                        <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                        </div>
                        <div class="mb-3 col-9">
                            <a class="btn mt-3" href="{{ route('admin.read') }}">
                                <i class="fas fa-arrow-left"></i>
                                <span>BACK</span>
                            </a>

                            <button type="submit" name="save" class="btn btn-primary mt-3 float-end">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        @endsection
