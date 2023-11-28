<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('pages.doctors.index', [
            'doctors' => Doctor::get(),
        ]);
    }

    public function create()
    {
        return view('pages.doctors.create', [
            'specialists' => Specialist::get(),
            'hospitals' => Hospital::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
            'price' => 'required|integer',
            'phone' => 'required|max:13',
            'location' => 'required'
        ]);
        Doctor::create($request->all());

        return redirect()->route('doctors.index')->withSuccess('Doctor successfully created');
    }

    public function edit($id)
    {
        return view('pages.doctors.edit', [
            'specialists' => Specialist::get(),
            'hospitals' => Hospital::get(),
            'doctor' => Doctor::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $request->validate([
            'name' => 'required|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
            'price' => 'required|integer',
            'phone' => 'required|max:13',
            'location' => 'required',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')->withSuccess('Doctor successfully updated');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->route('doctors.index')->withSuccess('Doctor successfully deleted');
    }
}
