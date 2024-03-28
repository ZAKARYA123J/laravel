<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Http\Resources\CompteCollection;
use App\Http\Resources\CompteResource;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes = Compte::with('societe', 'banque')->get();
        return response()->json($comptes);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompteRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'Compte' => 'required|string|max:255',
                'societe_id' => 'required|exists:societes,id',
                'banque_id' => 'required|exists:banques,id',
            ]);
    
            $compte = Compte::create($validatedData);
    
            return response()->json(['message' => 'Compte created successfully!', 'compte' => $compte]);
        } catch (\Exception $e) {
            // If any exception occurs during the process, handle it here
            return response()->json(['message' => 'Failed to create compte', 'error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compte=Compte::findOrFail($id);
        return new CompteResource($compte);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompteRequest $request, $id)
    {
        $compte = Compte::findOrFail($id);
        $validatedData = $request->validated();
        $compte->update($validatedData);
        return response()->json(['message' => 'Compte has been updated successfully', 'compte' => $compte]);
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte,$id)
    {
        $compte = Compte::findOrFail($id);
        $compte->delete();
        $res=[
            "message"=>"delet compte avec succes",
            "status"=>200,
            "data"=>$compte,
        ];
        return response()->json($res);
        //
    }

}
