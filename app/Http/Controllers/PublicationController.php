<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PublicationController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {
        // dd();
        $uuid = Str::uuid()->toString();
        $post = new Publication();
        $post->appartement_id = $uuid;
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
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        //
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
