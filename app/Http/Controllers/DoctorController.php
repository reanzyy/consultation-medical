<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
            'specialists' => Specialist::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|integer',
            'phone' => 'required|max:13',
        ]);
        Doctor::create($request->all());

        return redirect()->route('doctors.index')->withSuccess('Doctor successfully created');
    }

    public function edit($id)
    {
        return view('pages.doctors.edit', [
            'specialists' => Specialist::get(),
            'doctor' => Doctor::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $request->validate([
            'name' => 'required|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|integer',
            'phone' => 'required|max:13',
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