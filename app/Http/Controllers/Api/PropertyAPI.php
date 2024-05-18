<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Property::orderBy('name','asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProperty = new Property;
        $dataProperty->images = $request->image;
        $dataProperty->name = $request->name;
        $dataProperty->price = $request->price;
        $dataProperty->status = $request->status;
        $dataProperty->address = $request->address;
        $dataProperty->description = $request->description;
        $dataProperty->sqft = $request->sqft;
        $dataProperty->bath = $request->bath;
        $dataProperty->garage = $request->garage;
        $dataProperty->floor = $request->floor;
        $dataProperty->bed = $request->bed;

        $post =$dataProperty->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Property::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message'=> 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
