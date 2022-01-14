<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogResource;
use App\Models\Dog;
use Exception;
use Illuminate\Http\Request;

class DogController extends Controller
{

    public function index() {
        $dogs = Dog::all();
        return response()->json($dogs,200);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url'
        ]);

        try {
            $dog = new Dog;
            $dog->name = $validated["name"];
            $dog->image = $validated["image"];
            $dog->save();

            return response()->json($dog,201);
        }

        catch (Exception $Exception) {
            return response()->json(['message'=>"no se ha podido crear el dog: {$Exception->getMessage()}"]);
        };
    }

    public function show(Dog $dog) {
        return response()->json(['dog'=>$dog],200);
    }

    public function update(Request $request, Dog $dog){

        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|string'
        ]);

        $dog = new Dog;
        $dog->name = $validated['name'];
        $dog->image = $validated['image'];
        $dog->save();
        
        return response()->json($dog,201);
    }

    public function destroy(Dog $dog) {
        $dog->delete();
    }
};
