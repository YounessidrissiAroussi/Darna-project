@extends('layout')
@section('container')
@php
use App\Models\Ville;
    $cities = Ville::all();
@endphp
<form class="container rounded modal-content animate" style="margin-top: 12px" method="POST" action="/publish" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <h1 class="mt-2 mb-4 text-primary"><span class="text-dark">Create</span> Publish</h1>
        <div class="col">
            <div class="col-md-12">
                <div class="mt-3 mb-md-0">
                    <div>
                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Title" name="title" value="{{old('title')}}"/>
                        @error('title')
                            <div class="text-danger">
                                {{
                                    $message
                                }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mt-3 mb-md-0">
                    <textarea class="form-control px-4" style="height: auto; min-height: 150px;" name="Description" rows="4" cols="50">{{old('Description')}}</textarea>
                    @error('Description')
                    <div class="text-danger">
                        {{
                            $message
                        }}
                    </div>
                @enderror
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="mt-3 mb-md-0">
                    <select class="custom-select px-4" style="height: 47px;" name="badroom" value="{{old('badroom')}}">
                        <option value="" selected>Choose bedroom</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                    @error('badroom')
                    <div class="text-danger">
                        {{
                            $message
                        }}
                    </div>
                @enderror
                </div>
            </div> 
            <div class="col-md-12">
                <div class="mt-3 mb-md-0">
                    <select class="custom-select px-4" style="height: 47px;" name="ville" value="{{old('ville')}}">
                        <option value="">Choose City</option>
                        @foreach ($cities as $item)
                            <option value="{{$item->ville}}">{{$item->ville}}</option>
                        @endforeach
                    </select>
                    @error('ville')
                    <div class="text-danger">
                        {{
                            $message
                        }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 mb-md-0">
                    <div>
                        <input type="text" class="form-control p-4" placeholder="Price" name="price" value="{{old('price')}}"/>
                        @error('price')
                        <div class="text-danger">
                            {{
                                $message
                            }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 mb-md-0">
                    <div>
                        <input type="text" class="form-control p-4" placeholder="Number phone" name="number" value="{{old('number')}}"/>
                        @error('number')
                        <div class="text-danger">
                            {{
                                $message
                            }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 mb-md-0">
                    <input type="file" class="form-control py-2"  name="images[]" multiple  />
                    @error('images')
                    <div class="text-danger">
                        {{
                            $message
                        }}
                    </div>
                @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex" style="margin: auto">
        <button class="btn btn-primary rounded my-5" type="submit" style="margin-left:4%;">Create</button>
    </div>
</form>



@endsection