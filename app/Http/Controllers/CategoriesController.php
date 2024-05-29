<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Categories();
        $categories->idCategories = request('idCategories');
        $categories->nameCategories = request('nameCategories');
        $categories->save();
        return response()->json($categories, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categories::where('idCategories', $id)->first();
        if ($categories) {
            $categories->idCategories = request('idCategories');
            $categories->nameCategories = request('nameCategories');
            $categories->save();
            return response()->json($categories, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idCategories)
    {
        $categories = Categories::where('idCategories', $idCategories)->first();
        if ($categories) {
            $categories->delete();
            return response()->json($categories, 200);
        }
    }
}
