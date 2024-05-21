<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Property;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
;
class PropertyController extends Controller
{
    public function index()
    {

        $property = Property::all();
        $images=Image::all();
        if (request()->segment(1) == 'api')
            return response()->json([
                'error' => false,
                'data' => $property
            ]);
        return view('components.pages.management', ['property' => $property,'images'=>$images]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'status' => 'required',
            'address' => 'required',
            'description' => 'required',
            'sqft' => 'required|integer',
            'bath' => 'required|integer',
            'garage' => 'required|integer',
            'floor' => 'required|integer',
            'bed' => 'required|integer',
        ]);

        $new_property = Property::create($data);
        if($request->has('images')){
            foreach ($request->file('images') as $image) {
                // $image_property = $request->image;
                $original_image_property = Str::random(10) . $image->getClientOriginalName();
                $image->storeAs('public/images_property', $original_image_property);
                Image::create([
                    'property_id'=>$new_property->id,
                    'image'=>$original_image_property
                ]);
            }
        }
        return redirect()->route('property.view')->with('success', 'Property added');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'image' => 'image|mimes:jpeg, jpg, png',
            'name' => 'required|string',
            'price' => 'required',
            'status' => 'required',
            'address' => 'required',
            'description' => 'required',
            'sqft' => 'required|integer',
            'bath' => 'required|integer',
            'garage' => 'required|integer',
            'floor' => 'required|integer',
            'bed' => 'required|integer',
        ]);

        $properties = Property::find($id);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $original_image_property = Str::random(10) . $image->getClientOriginalName();
                $image->storeAs('public/images_property', $original_image_property);
                Image::create([
                    'property_id' => $properties->id,
                    'image' => $original_image_property
                ]);
            }
        }

        $properties->update($data);

        return redirect()->route('property.view')->with('success', 'Property updated');
    }

    public function deleteImage($imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::disk('public')->delete('images_property/' . $image->image);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted.');
    }

    public function deleted($id)
    {
        $property = Property::findOrFail($id);

        // Ensure images are retrieved as a collection
        $images = $property->images;

        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                Storage::disk('public')->delete('images_property/' . $image->image);
                $image->delete();
            }
        }

        $property->delete();

        return redirect()->route('property.view')->with('success', 'Property deleted');
    }



}


