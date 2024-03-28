<?php

namespace App\Http\Controllers;

use App\Models\Printcheque;
use App\Http\Requests\StorePrintchequeRequest;
use App\Http\Requests\UpdatePrintchequeRequest;

class PrintchequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printcheque=Printcheque::with('cheque')->get();
        return response()->json($printcheque);
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
    public function store(StorePrintchequeRequest $request)
    {
        $validate = $request->validate([
            'montant' => 'required|integer',
            'montant_lettere' => 'required|string|max:255',
            'ordre' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'date' => 'required|date',
            'cheque_id' => 'required|exists:cheques,id',
        ]);
        
        $validate['printed'] = false; // Add printed field with default value
        $printcheque = Printcheque::create($validate);
        $printcheque->update(['printed' => true]);
        
        return response()->json(['message' => 'cheque has been printed', 'printcheque' => $printcheque]);
        
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Printcheque $printcheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printcheque $printcheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrintchequeRequest $request, Printcheque $printcheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printcheque $printcheque)
    {
        //
    }
}
