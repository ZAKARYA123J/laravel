<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Http\Requests\StoreCarnetRequest;
use App\Http\Requests\UpdateCarnetRequest;

class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carnets = Carnet::with('compte')->get();
        return response()->json($carnets,201);
        //
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
    public function store(StoreCarnetRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|in:cheque,effect',
            'id_comptes' => 'required|exists:comptes,id',
            'ville' => 'required|string|max:255',
            'serie' => 'required|string|max:10', // Corrected 'string' spelling
            'first' => 'required|string|max:250',
            'last' => 'required|string|max:250',
            'remaining_checks' => 'integer|nullable', // Added nullable for 'remaining_checks'
        ]);
    
        $serie = $validatedData['serie'];
    
        // Prepend the 'serie' value to the 'first' and 'last' fields
        $validatedData['first'] = $serie . $validatedData['first'];
        $validatedData['last'] = $serie . $validatedData['last'];
        // Update existing variables for clarity


// Prepend serie with string interpolation
// $validatedData['first'] = "{$serie}{$originalFirst}";
// $validatedData['last'] = "{$serie}{$originalLast}";

    
        // Generate cosdecarnet value
        $alphabet = range('a', 'z'); // Array containing lowercase alphabets
        $randomAlphabet = $alphabet[array_rand($alphabet)]; // Use array_rand() for better random selection
        $randomNumber = rand(1, 20); // Generate a random number between 1 and 20
        $cosdecarnet = $randomAlphabet . '-' . $randomNumber;
    
        // Merge the generated cosdecarnet with the validated data
        $validatedData['cosdecarnet'] = $cosdecarnet;
    
        try {
            // Attempt to create a new Carnet record with the validated data
            $carnet = Carnet::create($validatedData);
    
            // If creation is successful, return the newly created Carnet as a JSON response
            return response()->json($carnet, 201);
        } catch (\Exception $e) {
            // If an exception occurs during the creation process, handle the error
            return response()->json(['error' => 'An error occurred while creating the Carnet.'], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Carnet $carnet,$id)
    {
        $carnet=Carnet::with('cheques')->findOrFail($id);
        return response()->json($carnet);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carnet $carnet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarnetRequest $request, Carnet $carnet,$id)
    {
        $validate=$request->validate([
            'type'=>'required',
            'taille'=>'required',
            'nomcompte'=>'required',
        ]);
        $carnet=Carnet::findOrFail($id);
        $carnet->update($validate);
        return response()->json($carnet,200);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carnet $carnet,$id)
    {
        $carnet=Carnet::findOrFail($id);
        $carnet->delete();
        return response()->json(null,201);
        //
    }
}
