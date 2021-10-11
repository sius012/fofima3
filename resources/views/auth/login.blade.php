@extends('layouts.app')

@section('content')
<style>
     .card-header{
    background-color: black;
    font-size: 23px;
    text-align: center;
    color: white;
    }
    .form-group{
    margin-left: -150px;
    text-align: center;
    }
    .btn{
        font-size: 18px;
        text-align: center;
        background: #333333;
        border-radius: 37px;
        border: none;
        box-shadow: 0px 1px 8px black;
        cursor: pointer;
        color: white;
        font-family: "Raleway SemiBold", sans-serif;
        height: 42.3px;
        margin:center;
        margin-right: 150px;
        margin-top: 50px;
        transition: 0.25s;
        width: 153px;
    }
   .btn:hover{
       background-color: black;
       color: white;
   }
    .form-control{
        border-color:  black;
    }
    .card{
       background: #fbfbfb;
       border-radius: 10px;
       box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
    }
   
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">
                    {{ __('Login') }}
                </div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right ">{{ __('Alamat E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4"style="margin-left:148px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="font-size:15px;">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn1 " href="{{ route('password.request') }}" style="text-decoration: none;font-size:15px;margin-left :400px;">
                                        {{ __('Lupa Password Anda?') }}
                                    </a>
                                @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="margin-top: 35px;text-align:center;">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection