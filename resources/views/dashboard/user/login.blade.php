@extends('layouts.app')
@section('title', 'Order')
@push('css')
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="flex-center">
                <div class="w-330px">
                    <h5 class="font-title center-align mt-50px">ចូលក្នុងប្រព័ន្ធ</h5>
                    <form action="{{ route('user.check') }}" method="POST" class="mt-25px" autocomplete="off">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        @csrf
                        <div class="card-panel">
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input placeholder="អ៊ីម៉ែល" id="email" type="email" name="email"
                                    class="validate font-content" value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">password</i>
                                    <input placeholder="លេខសម្ងាត់" id="password" type="password" name="password"
                                        class="validate font-content" value="{{ old('password') }}">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                    </div>
                                    <label>
                                        <input type="checkbox" onclick="myFunction()" class="filled-in">
                                        <span style=" font-size:12px;">Show Password</span>
                                    </label>
                                    <a href="#" style=" font-size:12px;margin-left:60px;color:violet;font-weight:bold;"
                                        id="shwoMessage">Forget
                                        password?</a>
                                    <button class="btn waves-effect waves-light font-content mb-25px mt-25px w-100pe text-white"
                                        type="submit" style="background: #0D47A1; ">
                                        <div class="flex-center">
                                            <i class="material-icons text-white">login</i>
                                            &nbsp;&nbsp;ចូល
                                        </div>
                                    </button>
                                    {{-- <p style=" font-size:12px;text-align:center"><a href="#"></a>
                                        <a href="{{ route('user.register') }}" style=" font-size:12px;margin-left:10px;">Register
                                            ?</a>
                                    </p> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('js')
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#shwoMessage').click(function() {
                        var message = "Please contact to admin";
                        alert(message);
                    });

                });

                function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        @endpush
