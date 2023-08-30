@extends('auth.auth')
@section('content')
<a href="/" class="text-center mt-5" id="brandlogin">
    <h1 class="m-0 text-primary"><span class="text-dark">Dar</span>na</h1>
</a>
<div class="col-lg-3 col-md-5" id="login">

<div class="card border-0">
    <div class="card-header bg-primary text-center p-4">
        <h1 class="text-white m-0">Login</h1>
    </div>
    <div class="card-body rounded-bottom bg-white p-5">
        <form method="POST" action="{{route('login.check')}}">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            @csrf
            <div class="form-group">
                <input type="email" class="form-control p-4" name="email" placeholder="Email" />
                
            </div>
            <div class="form-group">
                <input type="password" class="form-control p-4" name="password" placeholder="Password" />
            </div>
            <div>
                <button class="btn btn-primary btn-block py-3" type="submit">Login</button>
            </div>
        </form>
        <div class="col-lg-6 text-dark text-md-left mt-3">
            <a href="{{route('login.create')}}">Register ?</a></p>
        </div>
    </div>
</div>
</div>
@endsection