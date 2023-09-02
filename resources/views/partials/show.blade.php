@extends('layout')
@section('container')
@php
    use Carbon\Carbon;
@endphp
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center package-item bg-white mb-2 p-5 rounded">
            <div class="col-md-6">
                {{-- <img class="card-img-top " src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /> --}}
                <div class="container-fluid p-0 mt-5" >
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{asset('A.png')}}" alt="Image" width="1000" height="700">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{asset('A.png')}}" alt="Image">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn" style="width: 45px; height: 45px;">
                                <span class="fa fa-chevron-left color-danger mb-2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn" style="width: 45px; height: 45px;">
                                <span class="fa fa-chevron-right color-danger mb-2"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <h1>{{$pub->title}}</h1>
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$pub->city}}</small>
                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{Carbon::parse($pub->published_at)->diffForHumans() }}</small>
                        <small class="m-0"><i class="fa fa-bed text-primary mr-2"></i>{{$pub->bedroom}}</small>
                    </div>
                        <p class="text-dark">
                            {{$pub->Description}}
                        </p>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                
                                <h6 class="m-0"><i class="fa fa-phone text-primary mr-2"></i>0{{$pub->number}}</h6>
                                <h5 class="m-0">{{$pub->price}} DH</h5>
                            </div>
                        </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-outline-success flex-shrink-0" href="https://api.whatsapp.com/send?phone=+212666426275">
                        <i class="fa fa-phone"></i>
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="container mt-5">
    <div class="col-md-12">
        <div class="col-md-10 mb-4 pb-2">
            <div class="package-item bg-white mb-2">
                <div class="container-fluid p-0">
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="{{asset('A.png')}}" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{asset('A.png')}}" alt="Image">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>dgbdfgbg</small>
                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{Carbon::parse($item->published_at)->diffForHumans() }}</small>
                        <small class="m-0"><i class="fa fa-bed text-primary mr-2"></i>saklalaakn</small>
                    </div>
                    <h5>title</h5>
                        <p class="text-dark"></p>
                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i></small>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0"><i class="fa fa-phone text-primary mr-2"></i>0</h6>
                                <h5 class="m-0"> DH</h5>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>      
</div> --}}
@endsection