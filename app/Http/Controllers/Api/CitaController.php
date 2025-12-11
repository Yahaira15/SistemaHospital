<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cita::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'reason' => 'nullable|string',
            'status' => 'required|in:pendiente,realizada,cancelada',    
        ]);

        return Cita::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $data = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'reason' => 'nullable|string',
            'status' => 'required|in:pendiente,realizada,cancelada',    
        ]);

        $cita->update($data);
        return $cita;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete(); 

        return response()->json([
            'message' => 'Cita eliminada correctamente'
        ]);
    }
}
