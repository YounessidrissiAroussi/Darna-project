<div class="container-fluid">
    @php use Carbon\Carbon;@endphp
    @auth
    <div class="container pt-5">
        <div class="col-lg-8">
            <div class="row">
                    <a href="/create"  class="col-md-6 text-decoration-none border border-primary border-5 py-3 rounded-pill bg-white" style="cursor: pointer;">
                            Create Post
                    </a>
            </div>
        </div>
    </div>
    @endauth
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Form -->
                <div class="mb-5">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Filter by City</h4>
                    <div class="bg-white" style="padding: 30px;">
                        <div class="input-group d-block">
                            <div class="mt-3 mb-md-0">
                                <select class="custom-select px-4" style="height: 47px;" wire:model="search" >
                                    <option value="">Choose City</option>
                                    @foreach ($cities as $item)
                                        <option value="{{$item->ville}}">{{$item->ville}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <button class="btn btn-outline-success p-2 w-100" wire:click.prevent="show()">Search <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row pb-3">
            @foreach ($publications as $item)
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="{{ isset($item->images[0]) ? asset("storage/{$item->images[0]->images}") : '' }}" alt=""  width="1000" height="700">
                            @auth
                            @if (auth()->user()->id == $item->profile_id)
                              <div class="btn-group dropright" style="position:absolute;left:88% ">
                                <a type="button" class="btn btn-dark text-white dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-list"></i>
                                </a>
                                <div class="dropdown-menu rounded">
                                        <h6 class="dropdown-header">MORE ACTIONS</h6>
                                        <a class="dropdown-item fa fa-edit" href="/{{$item->id}}/edit"> Edit</a>
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
                                <a class=" text-decoration-none" href="/{{$item->id}}/show">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$item->city}}</small>
                                    {{-- <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{Carbon::parse($item->published_at)->diffForHumans() }}</small> --}}
                                    <small class="m-0"><i class="fa fa-bed text-primary mr-2"></i>{{$item->bedroom}}</small>
                                </div>
                                <h5>{{$item->title}}</h5>
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
            
        </div>
    </div>
</div>
