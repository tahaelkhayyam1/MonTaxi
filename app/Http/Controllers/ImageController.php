<?php

namespace App\Http\Controllers;
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $imageFile = $request->file('image');
        $imageData = file_get_contents($imageFile->getRealPath());

        $image = new Image;
        $image->data = $imageData;
        $image->description = $request->input('description');
        $image->save();

        return back()->with('success', 'Image uploaded successfully.');
    }

    public function show($id)
    {
        $image = Image::find($id);
        return response($image->data)->header('Content-Type', 'image/jpeg');
    }
}
