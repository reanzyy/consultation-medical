<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Rating;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Patient::query();
        $patients = $query->get();

        return view('pages.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Name must be at required',
            'name.min' => 'Minimum 5 characters!',
            'name.max' => 'Maximum 255 characters!',
            'address.required' => 'Address must be required',
            'phone.required' => 'Phone must be required',
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index')->withSuccess('Patient has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rating = Rating::all();
        $patient = Patient::find($id);
        abort_if(!$patient, 400, 'Patient does not exist');

        return view('pages.patient.edit', compact('patient', 'rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::find($id);
        abort_if(!$patient, 400, 'Patient does not exist');

        $request->validate([
            'name' => 'required|min:5|max:255',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Name must be at required',
            'name.min' => 'Minimum 5 characters!',
            'name.max' => 'Maximum 255 characters!',
            'address.required' => 'Address must be required',
            'phone.required' => 'Phone must be required',
        ]);

        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index')->withSuccess('Patient has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        abort_if(!$patient, 400, 'Patient does not exist');

        $patient->delete();

        return redirect()->route('patients.index')->withSuccess('Patient has been removed!');
    }
}
