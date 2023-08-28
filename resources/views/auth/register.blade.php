@extends('auth.auth')
@section('content')
<a href="/" class="text-center mt-5" id="brandlogin">
    <h1 class="m-0 text-primary"><span class="text-dark">Dar</span>na</h1>
</a>
<div class="col-lg-3 col-md-5" id="login">

<div class="card border-0">
    <div class="card-header bg-primary text-center p-4">
        <h1 class="text-white m-0">Register</h1>
    </div>
    <div class="card-body rounded-bottom bg-white p-5">
        <form method="POST" action="{{route('login.create')}}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control p-4" name="name" placeholder="Name" value="{{old('name')}}"/>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control p-4" name="email" placeholder="Email" value="{{old('email')}}" />
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control p-4" name="password" placeholder="Password" />
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control p-4" name="password_confirmation" placeholder="Confirmer Password" />
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary btn-block py-3" type="submit">Register</button>
            </div>
        </form>
        <div class="col-lg-6 text-dark text-md-left mt-3">
            <a href="{{route('login.check')}}">Aready account ?</a></p>
        </div>
    </div>
</div>
</div>
@endsection