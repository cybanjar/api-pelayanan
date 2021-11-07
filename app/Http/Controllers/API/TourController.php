<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index() {
        $tour = Tour::all();
        return response()->json([
            'success'   => true,
            'data'      => $tour
        ]);
    }
    
    public function store(Request $request) {
        $validator = $request->validate([
            'category'       => 'required',
            'locationName'   => 'required',
            'description'    => 'required',
            'regional'       => 'required',
            'image'          => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);
    
        if(!$validator) {
            return response()->json([
                'success'   => false,
                'error'     => $validator->errors(),
                'message'   => 'Failed!'
            ], 401); 
        }
    
        $tour = Tour::create([
            'category'       => $request->category,
            'locationName'   => $request->locationName,
            'description'    => $request->description,
            'regional'       => $request->regional,
            'image'          => $request->file('image')->store('assets/adventure', 'public')
        ]);
    
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully',
            'data'      => $tour,
        ], 201);
    }
}
