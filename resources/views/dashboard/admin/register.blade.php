@extends('layouts.app')
@section('title', 'Register')
@push('css')
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="flex-center">
                <div class="w-330px">
                    <h5 class="font-title center-align mt-50px">ចុះឈ្មោះចូលក្នុងប្រព័ន្ធ</h5>
                    <form action="{{ route('admin.create') }}" method="POST" class="mt-25px " autocomplete="off">
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
                        <div class="card-panel">
                            <div class="input-field">
                                <i class="fas fa-user-alt prefix" style="font-size: 28px!important; margin-right: 5px;"></i>
                                <input placeholder="ឈ្មោះ" id="name" name="name" type="text" class="validate font-content"
                                    value="{{ old('name') }}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input placeholder="អ៊ីម៉ែល" id="email" name="email" type="email"
                                        class="validate font-content" value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">password</i>
                                <input placeholder="លេខសម្ងាត់" id="password" name="password" type="password"
                                       class="validate font-content" value="{{ old('password') }}">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">password</i>
                                <input placeholder="បញ្ជាក់លេខសម្ងាត់" id="password" name="cpassword" type="password"
                                       class="validate font-content" value="{{ old('cpassword') }}">
                                <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                            </div>
                            <label>
                                <input type="checkbox" onclick="myFunction()" class="filled-in">
                                <span style=" font-size:12px;">Show Password</span>
                            </label>
                            <a href="#" style=" font-size:12px;margin-left:60px;color:violet;font-weight:bold;">Forget password?</a>
                            <button class="btn waves-effect waves-light font-content mb-25px mt-25px w-100pe text-white"
                                    type="submit" style="background: #0D47A1; ">
                                <div class="flex-center">
                                    <i class="fas fa-user-plus"></i>
                                    &nbsp;&nbsp;ចុះឈ្មោះ
                                </div>
                            </button>
                            <p style=" font-size:12px;text-align:center">You want login? <a href="{{ route('admin.login') }}" style=" font-size:12px;margin-left:10px;">Admin ?</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
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
        } );
    </script>

@endpush