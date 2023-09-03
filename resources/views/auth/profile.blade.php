@extends('layout')
@section('container')

@php
     use Carbon\Carbon;
@endphp

<div class="mx-5 row row-cols-1 row-cols-md-2 g-5 ">
    <div class="col-md-4 mt-4">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="row pb-3">
                @foreach ($user->Publications as $item)
                        <div class="col-md-4 mb-4 pb-2">
                            <div class="package-item bg-white mb-2">
                                <img class="img-fluid" src="{{asset('A.png')}}" alt="">
                                @auth
                                @if (auth()->user()->id == $item->profile_id)
                                  <div class="btn-group dropright" style="position:absolute;left:88% ">
                                    <a type="button" class="btn btn-dark text-white dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fa fa-list"></i>
                                    </a>
                                    <div class="dropdown-menu rounded">
                                            <h6 class="dropdown-header">MORE ACTIONS</h6>
                                            <a class="dropdown-item fa fa-edit" href="#"> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="/delete/{{$item->id}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="dropdown-item bg-danger text-white py-2 mb-0 fa fa-trash" onclick="return confirm('U want really Delete this post??')">Delete</button>
                                            </form>
                                    </div>
                                  </div>  
                                @endif
                                
                                @endauth
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$item->city}}</small>
                                        
                                        <small class="m-0"><i class="fa fa-bed text-primary mr-2"></i>{{$item->bedroom}}</small>
                                    </div>
                                    <a class=" text-decoration-none" href="/"><h5>{{$item->title}}</h5>
                                        <p class="text-dark">{{ Str::limit($item->Description, 100) }}</p>
                                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{Carbon::parse($item->published_at)->diffForHumans()}}</small>
                                        <div class="border-top mt-4 pt-4">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="m-0"><i class="fa fa-phone text-primary mr-2"></i>0{{$item->number}}</h6>
                                                <h5 class="m-0">{{$item->price}} DH</h5>
                                                
                                            </div>
                                        </div>
                                    </a>
                                    <div class="border-top mt-4 pt-4">
                                        <div class="d-flex justify-content-between">
                                            @if ($item->show == 1)
                                                <form action="/hide/{{$item->id}}" method="POST">
                                                @csrf
                                                @method("PATCH")
                                                <button class="dropdown-item bg-danger text-white py-2 mb-0 fa fa-eye-slash">Hide</button>
                                                <p class="text-gray mt-3">This Post Public</p>
                                            </form>
                                            @else
                                            <form action="/pub/{{$item->id}}" method="POST">
                                                @csrf
                                                @method("PATCH")
                                                <button class="dropdown-item bg-success text-white py-2 mb-0 fa fa-eye">public</button>
                                                <p class="text-gray mt-3">This Post Hidden</p>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection