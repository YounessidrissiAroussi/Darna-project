@extends('layout')
@section('container')
<div class="container-fluid">
    @php
    use App\Models\Ville;
    use App\Models\Publication;
    use Carbon\Carbon;
        $cities = Ville::all();
         $publications = Publication::where('published_at', '<=', now())->orderByDesc('published_at')->get();
    @endphp
    @auth
    <div class="container pt-5">
            <div class="col-lg-8">
                <div class="row">
                        <a onclick="document.getElementById('id01').style.display='block'"  class="col-md-6 text-decoration-none border border-primary border-5 py-3 rounded-pill bg-white" style="cursor: pointer;">
                                start a post
                        </a>
                </div>
                    <div id="id01" class="modal" style="overflow-y: scroll;">
                        <form class="container rounded modal-content animate" method="POST" action="/publish" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <h1 class="mt-2 mb-4 text-primary"><span class="text-dark">Create</span> Publish</h1>
                                <div class="col">
                                    <div class="col-md-12">
                                        <div class="mt-3 mb-md-0">
                                            <div>
                                                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Title" name="title" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-3 mb-md-0">
                                            <textarea class="form-control px-4" style="height: 47px;" name="Description">Write description</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="mt-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" name="badroom">
                                                <option selected>Choose bedroom</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5+">5+</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="mt-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" name="ville">
                                                <option selected>Choose City</option>
                                                @foreach ($cities as $item)
                                                    <option value="{{$item->ville}}">{{$item->ville}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 mb-md-0">
                                            <div>
                                                <input type="text" class="form-control p-4" placeholder="Price" name="price"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 mb-md-0">
                                            <div>
                                                <input type="text" class="form-control p-4" placeholder="Number phone" name="number"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 mb-md-0">
                                            <input type="file" class="form-control py-2"  name="images[]" multiple />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="margin: auto">
                                <button  class="btn btn-primary rounded my-5 " style="margin-left:4%;"> Create</button>
                            </div>
                        </form>
                        
                      </div>
                </div>
            </div> 
    </div>  
     
@endauth
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row pb-3">
            @foreach ($publications as $item)
                    <div class="col-md-6 mb-4 pb-2">
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
                                    {{-- <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{Carbon::parse($item->published_at)->diffForHumans() }}</small> --}}
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
                            </div>
                        </div>
                    </div>
            @endforeach  
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