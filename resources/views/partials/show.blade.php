@extends('layout')
@section('container')
@php
    use Carbon\Carbon;
@endphp
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center package-item bg-white mb-2 p-5 rounded">
            <div class="col-md-6">
                <div class="container-fluid p-0 mt-5" >
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" style="margin-bottom: 80%">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{ isset($pub->images[0]) ? asset("storage/{$pub->images[0]->images}") : '' }}" alt="" style="height: 400px;">                            </div>
                            @if (@isset($pub->images))
                                 @for ($i = 1; $i <  @count($pub->images); $i++)
                                    <div class="carousel-item">
                                            <img class="img-fluid" src="{{asset("storage/{$pub->images[$i]->images}")}}" alt="Image" style="height: 400px;">
                                    </div>
                             @endfor
                            @endif
                           
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
                    <a class="btn btn-outline-success flex-shrink-0" href="https://api.whatsapp.com/send?phone=0{{$pub->number}}">
                        <i class="fa fa-phone"></i>
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection