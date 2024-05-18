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

    // public function edit($id)
    // {
    //     $properties = Property::find($id);

    //     return view('components.pages.management', ['properties' => $properties]);
    // }

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

        // $image_property = $request->image;
        // $original_image_property = Str::random(10) . $image_property->getClientOriginalName();
        // $image_property->storeAs('public/images_property', $original_image_property);
        // $data['image'] = $original_image_property;

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

        if ($request->image) {
            // save new image
            $image_property = $request->image;
            $original_image_property = Str::random(10) . $image_property->getClientOriginalName();
            $image_property->storeAs('public/images_property', $original_image_property);
            $data['image'] = $original_image_property;

            // delete old image
            Storage::delete('public/images_property' . $properties->image);
        }

        $properties->update($data);

        return redirect()->route('property.view')->with('success', 'Property updated');
    }

    public function deleted($id)
    {
        Property::find($id)->delete();
        // print("tes");
        // $images = Image::where('property_id',$id)->get();
        // DB::table('members')->where('email',$request->email)->first();
        // $images=DB::table('images')->where('property_id',$id)->get()->toArray();

        $images=DB::table('images')->where('property_id',$id)->get();
        // print_r($images);
        // print_r($id);
        // print(gettype($id));
        // print(gettype(strval($images[0]->property_id)));
        
        
        // Storage::delete('oBu3HicUn71.jpg');
        // $image_path = public_path("storage/images_property")
        // Storage::delete('storage/images_property/oBu3HicUn71.jpg');
        foreach ($images as $image) {
            unlink('storage/images_property/'.$image->image);
            // DB::table('images')->where('property_id',$id)->delete();
            DB::table('images')->where('id',strval($image->id))->delete();
            // print_r(strval($image->property_id));
            // Image::find(strval($image->property_id))->delete();
            // DB::table('images')->where('')
        }

        return redirect()->route('property.view')->with('success', 'Property deleted');
    }
}
