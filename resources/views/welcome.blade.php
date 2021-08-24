@extends('layouts.app')
@section('title', 'Role')
@section('content')
    <div class="container" style="margin-top: 90px;">
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
