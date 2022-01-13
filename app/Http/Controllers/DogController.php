<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogResource;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{

    public function index() {
        $dogs = Dog::paginate();
        return DogResource::collection($dogs);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string'
        ]);
        $dog = Dog::create($validated);
        return new DogResource($dog);
    }

    public function show(Dog $dog)
    {
        return new DogResource($dog);
    }


    public function edit(Dog $dog)
    {
        //
    }

    public function update(Request $request, Dog $dog){

        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|string'
        ]);
        
        $dog->update($validated);
        return new DogResource($dog);
    }

    public function destroy(Dog $dog) {
        $dog->delete();
    }
};
