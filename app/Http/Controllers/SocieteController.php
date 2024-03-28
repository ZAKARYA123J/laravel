<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Http\Requests\StoreSocieteRequest;
use App\Http\Requests\UpdateSocieteRequest;
use App\Http\Resources\SocieteResource;
use App\Http\Resources\SocieteCollection;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $societes = Societe::with('comptes')->get();
        return response()->json($societes);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Nomsociete' => 'required|string|max:255',
        ]);
    
        // Merge the validated data and additional data
        $dataToInsert = array_merge($validatedData, $request->all());
    
        try {
            // Create a new instance of Societe and insert data into the database
            $newSociete = Societe::create($dataToInsert);
    
            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Societe created successfully',
                'societe' => new SocieteResource($newSociete)
            ], 201);
        } catch (\Exception $e) {
            // Return a JSON response indicating failure in case of an exception
            return response()->json(['error' => 'Failed to create societe', 'message' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocieteRequest $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $societe = Societe::with('comptes')->findOrFail($id);
        return new SocieteResource($societe);

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Societe $societe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocieteRequest $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'Nomsociete' => 'required|string|max:255', // Assuming 'Nomsociete' is the correct field name
        ]);
        
        // Find the Societe instance by its ID
        $societe = Societe::findOrFail($id);
    
        // Update the Societe instance with the validated data
        $societe->update(['Nomsociete' => $validatedData['Nomsociete']]); // Assuming 'name' is the field name in the database
    
        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Societe updated successfully',
            'data' => new SocieteResource($societe),
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $societe = Societe::findOrFail($id);
        $societe->delete();
        $res=[
            "message"=>"delet societe avec succes",
            "status"=>200,
            "data"=>$societe,
        ];
        return response()->json($res);
        //
    }
}
