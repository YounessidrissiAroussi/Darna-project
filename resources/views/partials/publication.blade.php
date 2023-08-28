@extends('layout')
@section('container')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row pb-3">
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="img/package-1.jpg" alt="">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                    <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                                </div>
                                <a class="h5 text-decoration-none" href="/">Discover amazing places of the world with us</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                        <h5 class="m-0">$350</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Form -->
                <div class="mb-5">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Filter</h4>
                    <div class="bg-white" style="padding: 30px;">
                        <div class="input-group d-block">
                            <form>
                                <input type="text" class="form-control p-4 w-100 my-2" placeholder="City">
                                <input type="text" class="form-control p-4 w-100 my-2" placeholder="Max Prise">
                                <input type="text" class="form-control p-4 w-100 my-2" placeholder="Min Prise">
                                <input type="text" class="form-control p-4 w-100 my-2" placeholder="type">
                                <button class="btn btn-outline-success p-2 w-100">Search <i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Category List -->
                <div class="mb-5">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h4>
                    <div class="bg-white" style="padding: 30px;">
                        <ul class="list-inline m-0">
                            <li class="mb-3 d-flex justify-content-between align-items-center">
                                <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Villa de luxe</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between align-items-center">
                                <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>Appartement</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between align-items-center">
                                <a class="text-dark" href="#"><i
                                        class="fa fa-angle-right text-primary mr-2"></i>Comping</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection