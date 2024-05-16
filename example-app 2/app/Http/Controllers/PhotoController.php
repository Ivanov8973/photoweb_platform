<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts from DB
       $photos = Photo::orderBy("created_at", "desc")->paginate(10);
        return view('photos.index',['photos' => $photos]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        return view('photos.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');
        $imageName = time().'.'.$image->extension();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $photo = new Photo();
        $photo->name = $request->name;
        $photo->description = $request->description ?? '';
        $photo->image = 'images/'.$imageName;
        
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully.');
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(Photo $photo)
    {
        return view('photos.show', ['photo'=> $photo]);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index');
    }
}
