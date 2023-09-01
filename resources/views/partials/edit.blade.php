@extends('layout')
@section('container')
@php
use App\Models\Ville;
    $cities = Ville::all();
@endphp
    <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <form class="container rounded modal-content animate" method="POST" action="/update/{{$pub->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <h1 class="mt-2 mb-4 mt-5 text-warning"><span class="text-dark">Edit</span> Publish</h1>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="mt-3 mb-md-0">
                                        <div>
                                            <input type="hidden" class="form-control p-4 datetimepicker-input" placeholder="Title" name="show" value="{{$pub->show}}" />
                                            <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Title" name="title" value="{{$pub->title}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <textarea class="form-control px-4" style="height: auto; min-height: 150px;" name="Description" rows="4" cols="50">{{$pub->Description}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mt-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="badroom">
                                            <option value="1" @if($pub->bedroom == '1') selected @endif>1</option>
                                            <option value="2" @if($pub->bedroom == '2') selected @endif>2</option>
                                            <option value="3" @if($pub->bedroom == '3') selected @endif>3</option>
                                            <option value="4" @if($pub->bedroom == '4') selected @endif>4</option>
                                            <option value="5+" @if($pub->bedroom == '5+') selected @endif>5+</option>  
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="mt-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="ville">
                                            @foreach ($cities as $item)
                                                <option value="{{$item->ville}}"  @if($item->ville==$pub->city) selected @endif>{{$item->ville}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 mb-md-0">
                                        <div>
                                            <input type="text" class="form-control p-4" placeholder="Price" name="price" value="{{$pub->price}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 mb-md-0">
                                        <div>
                                            <input type="text" class="form-control p-4" placeholder="Number phone" name="number" value="0{{$pub->number}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 mb-md-0">
                                        <input type="file" class="form-control py-2"  name="images[]" multiple />
                                    </div>
                                </div>
                            </div><button  class="btn btn-warning text-white rounded my-5 " style="margin-left:4%;"> Edit</button>
                        </div>
                        <div class="d-flex" style="margin: auto">
                            
                        </div>
                    </form>
                </div>
            </div>      
    </div>

@endsection