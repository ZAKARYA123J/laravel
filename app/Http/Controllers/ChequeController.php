<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Carnet;
use App\Http\Requests\StoreChequeRequest;
use App\Http\Requests\UpdateChequeRequest;
use Illuminate\Http\Request; 

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cheque=Cheque::with('carnet')->get();
        return response()->json($cheque);
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
    public function store(StoreChequeRequest $request)
    {
        // Validating the incoming request data
        $validatedData = $request->validate([
            'cheque_number' => 'required|integer',
            'emission_date' => 'required|date',
            'payment_date' => 'required|date',
            'beneficiary' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'concern' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'carnet_id' => 'required|exists:carnets,id'
        ]);
        try {
            // Creating a new Cheque instance with the validated data
            $cheque = Cheque::create($validatedData);
    
            // Get the carnet
            $carnet = Carnet::findOrFail($request->carnet_id);
    
            // Check if there are checks in stock
            if ($carnet->remaining_checks === 0) {
                return response()->json(['error' => 'No checks in stock'], 400);
            }
    
            // Assuming each print reduces the remaining check count by 1
            $carnet->remaining_checks -= 1;
            $carnet->save();
    
            // Check if remaining_checks equals 10
            if ($carnet->remaining_checks == 10) {
                // Send a message or trigger an action
                // For demonstration purposes, I'm just returning a message in the JSON response
                return response()->json(['message' => 'Only 10 checks remaining'], 200);
            }
    
            // Returning a JSON response indicating success
            return response()->json(['message' => 'Cheque created successfully', 'cheque' => $cheque]);
        } catch (\Exception $e) {
            // Returning a JSON response indicating failure in case of an exception
            return response()->json(['error' => 'Failed to create cheque', 'message' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cheque $cheque,$id)
    {
        $cheque=Cheque::findOrFail($id);
        return response()->json($cheque);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cheque $cheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChequeRequest $request, Cheque $cheque,$id)
    {
        $validate=$request->validate([
            'beneficiaire' => 'required',
            'montant' => 'required',
            'montantalphabit' => 'required',
            'lorder_de'=>'required',
            'facture' => 'required',
            'place'=>'required',
        ]);
        $cheque=Cheque::findOrFail($id);
        $cheque->update($validate);
        return response()->json(['messgae'=>'cheque update avec succes','cheque'=>$cheque]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cheque $cheque,$id)
    {
        $cheque=Cheque::findOrFail($id);
        $cheque->delete();
        return response()->json(null,201);
        //
    }
    // public function printCheck(Request $request, $carnet_id)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'beneficiaire' => 'required|max:255',
    //         'montant' => 'required',
    //         'montantaphabit' => 'required',
    //         'lorder_de' => 'required',
    //         'place' => 'required'
    //     ]);
    
    //     try {
    //         // Get the carnet
    //         $carnet = Carnet::findOrFail($carnet_id);
    //         if($carnet->remaining_checks === 0){
    //             return response()->json(['error'=>'No checks in stock'],400);
    //         }
    //         // Assuming each print reduces the remaining check count by 1
    //         $carnet->remaining_checks -= 1;
    //         $carnet->save();
    
    //         // Check if remaining_checks equals 10
    //         if ($carnet->remaining_checks == 10) {
    //             // Send a message or trigger an action
    //             // For demonstration purposes, I'm just returning a message in the JSON response
    //             return response()->json(['message' => 'Only 10 checks remaining'], 200);
    //         }
    
    //         // Return the updated remaining check count
    //         return response()->json(['remaining_checks' => $carnet->remaining_checks], 200);
    //     } catch (\Exception $e) {
    //         // Handle any exceptions (e.g., ModelNotFoundException)
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    
    
    

}
