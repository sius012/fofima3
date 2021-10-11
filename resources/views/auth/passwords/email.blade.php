@extends('layouts.app')

@section('content')
<style>
    .card-header{
    background-color: black;
    font-size: 22px;
    text-align: center;
    color: white;
    }
    .form-group{
    margin-left: -150px;
    text-align: center;
    }
    .btn{
        font-size: 17px;
        text-align: center;
        background: #333333;
        border-radius: 37px;
        border: none;
        box-shadow: 0px 1px 8px black;
        cursor: pointer;
        color: white;
        font-family: "Raleway SemiBold", sans-serif;
        height: 42.3px;
        margin: 0 auto;
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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim Link Reset Password') }}
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
