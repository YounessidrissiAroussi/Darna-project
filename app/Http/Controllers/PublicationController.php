<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Images;
use Illuminate\Http\Request;
class PublicationController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     */

    public function hide(UpdatePublicationRequest $request)
    {
        
        $post = Publication::find($request->id);
        $post->show = 0;
        $post->title = $request->title;
        $post->Description = $request->Description;
        $post->bedroom = $request->bedroom;
        $post->city = $request->city;
        $post->price = (int)$request->price;
        $post->number = (int)$request->number;
        $post->profile_id = $request->profile_id;
        $post->published_at = $request->published_at;
        $post->update();
        return back();
    }
    public function pub(UpdatePublicationRequest $request)
    {
        
        $post = Publication::find($request->id);
        $post->show = 1;
        $post->title = $request->title;
        $post->Description = $request->Description;
        $post->bedroom = $request->bedroom;
        $post->city = $request->city;
        $post->price = (int)$request->price;
        $post->number = (int)$request->number;
        $post->profile_id = $request->profile_id;
        $post->published_at = $request->published_at;
        $post->update();
        return back();
    }
    public function store(StorePublicationRequest $request)
    {
        $post = new Publication();
        $post->show = 0;
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
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pub = Publication::find($request->id);
       return view('partials.edit',compact('pub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request)
    {
        // dd($request->all());
        $post = Publication::find($request->id);
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
        $publication->delete();
        return back();
    }
}
