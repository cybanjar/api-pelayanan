<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return response()->json([
            'success'   => true,
            'data'      => $category
        ]);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'category'       => 'required',
            'flag'           => 'required'
        ]);
    
        if(!$validator) {
            return response()->json([
                'success'   => false,
                'error'     => $validator->errors(),
                'message'   => 'Failed!'
            ], 401); 
        }
    
        $category = Category::create([
            'category'      => $request->category,
            'flag'          => $request->flag,
        ]);
    
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully',
            'data'      => $category,
        ], 201);
    }
}
