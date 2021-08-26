@extends('layouts.app')
@section('title', 'Role')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ asset('/images/teamcoffee.jpg') }}" alt="logo" width="400px" height="400px">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 form-group">
                <a href="{{ route('admin.login') }}" class="btn btn-primary text-white form-control">Admin Login</a>
            </div>
            <div class="col-md-8 form-group">
                <a href="{{ route('user.login') }}" class="btn btn-primary text-white form-control">Staff Login</a>
            </div>
        </div>
    </div>
@endsection
