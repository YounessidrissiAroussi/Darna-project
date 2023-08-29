@extends('layout')
@section('container')

<div class="mx-5 row row-cols-1 row-cols-md-2 g-5 ">
    <div class="col-md-4">
        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">My Profile</h4>
        <div class="bg-white" style="padding: 30px;">
            <div class="input-group d-flex">
                <form>
                    <img class="rounded-circle shadow-4-strong my-3" alt="avatar2" src="https://ui-avatars.com/api/?name={{$user->name}}" />
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">
                        {{
                            $user->email
                        }}
                    </p>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h4 class="text-uppercase mt-4" style="letter-spacing: 5px;">my Publications</h4>
        <div class="bg-white" style="padding: 30px;">
            Publications//
        </div>
    </div>
</div>
@endsection