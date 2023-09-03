<?php

namespace App\Http\Controllers;


use App\Models\Images;
use App\Models\Publication;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    public function hide(UpdatePublicationRequest $request)
    { 
        $post = Publication::find($request->id);
        $post->show = 0;
        $post->update();
        return back();
    }
    public function pub(UpdatePublicationRequest $request)
    {
        $post = Publication::find($request->id);
        $post->show = 1;
        $post->update();
        return back();
    }
    public function create()
    {
        return view('partials.create');
    }
    public function store(StorePublicationRequest $request)
    {
        $request->Validated();
        $post = new Publication();
        $post->show = 1;
        $post->title = $request->title;
        $post->Description = $request->Description;
        $post->bedroom = $request->badroom;
        $post->city = $request->ville;
        $post->price = (int)$request->price;
        $post->number = (int)$request->number;
        $post->profile_id = $request->user()->id;
        $post->published_at = now();
        $post->save();
      
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $path = $image->store('Images','public');
                $img = new Images();
                $img->images = $path;
                $img->publication_id = $post->id;
                $img->save();
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $pub = Publication::find($request->id);
       return view('partials.show',compact('pub'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pub = Publication::find($request->id);
        $this->authorize('update',$pub);
        return view('partials.edit',compact('pub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request)
    {
        
        $post = Publication::find($request->id);
        Gate::authorize('update',$post);
        $post->show = $request->show;
        $post->title = $request->title;
        $post->Description = $request->Description;
        $post->bedroom = $request->badroom;
        $post->city = $request->ville;
        $post->price = (int)$request->price;
        $post->number = (int)$request->number;
        $post->profile_id = $request->user()->id;
        $post->published_at = $post->published_at;
        $post->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $publication = Publication::find($request->id);
        // dd($publication->images );
            foreach($publication->images as $image){
                $publication->delete();
                File::delete('storage/'.$image->images);
            }
        $publication->delete();
        return back();
    }
}
