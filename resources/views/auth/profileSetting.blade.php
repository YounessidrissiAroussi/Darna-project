@extends('layout')
@section('container')

<div class="mx-5 row row-cols-1 row-cols-md-2 g-5 mt-2 ">
    <div class="col-md-8">
        <h4 class="text-uppercase mt-4" style="letter-spacing: 5px;">Edit my Information</h4>
        <div class="bg-white" style="padding: 30px;">
            <div class="input-group d-block">
                <form action="/updateProfile/{{$user->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" class="form-control p-4 w-100 my-2" name="name" value="{{$user->name}}">
                    @error('name')
                        {{
                            $message
                        }}
                    @enderror
                    <input type="text" class="form-control p-4 w-100 my-2" placeholder="Ur Password" name="old_password">
                    <input type="password" class="form-control p-4 w-100 my-2" placeholder="New password" name="password">
                    @error('password')
                        {{
                            $message
                        }}
                    @enderror
                    <input type="password" class="form-control p-4 w-100 my-2" placeholder="password_confirmation" name="password_confirmation" >
                    <button class="btn btn-success p-2 rounded" >Edit <i class="fa fa-edit"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="my-5">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success')}}
                </div>
            @endif
        </div>
        <div class="my-5">
            @if (session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session('danger')}}
                </div>
            @endif
        </div>
        
    </div>
    <div class="col-md-8">
        <h4 class="text-uppercase mt-4" style="letter-spacing: 5px;">Delete Account</h4>
        <div class="bg-white" style="padding: 30px;">
            <div class="input-group d-block">
                <p class="text-gray text-justify">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information you wish to keep.
                </p>
                <form action="/deleteProfile/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" class="form-control p-4 w-100 my-2" placeholder="Enter your password" name="password">
                    <button onclick="return confirm('Are you sure u want Delete ur Profile ? ')" class="btn btn-danger p-2 rounded" >Delete <i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection