<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Http\Requests\StoreBanqueRequest;
use App\Http\Requests\UpdateBanqueRequest;

class BanqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banque=Banque::all();
        return response()->json($banque);
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
    public function store(StoreBanqueRequest $request)
    {
        // Validate the request
        $validate=$request->validate(
            [
            'banque' => 'required|string|max:255',
        ]);
            $banque=Banque::create($validate);
        // Return a JSON response with a success message and the created Banque instance
        return response()->json(['message' => 'Insertion successful', 'banque' => $banque], 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Banque $banque,$id)
    {
        $banque=Banque::findOrFail($id);
        return response()->json($banque);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banque $banque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBanqueRequest $request, Banque $banque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banque $banque,$id)
    {
        $banque=Banque::findOrFail($id);
        $banque->delete();
        return response()->json('remove avec succes',201);
        //
    }
}
