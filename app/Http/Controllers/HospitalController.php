<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Hospital::query();
        $hospitals = $query->get();

        return view('pages.hospitals.index', compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hospitals,name|max:255',
            'address' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.unique' => 'Nama telah digunakan!',
            'name.max' => 'Maksimal 255 karakter!',
            'address.required' => 'Lokasi harus diisi!'
        ]);

        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->save();

        return redirect()->route('hospitals.index')->withSuccess('Rumah sakit berhasil ditambahakan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hospital = Hospital::find($id);
        abort_if(!$hospital, 404, 'Rumah sakit tidak ditemukan!');

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.max' => 'Maksimal 255 karakter!',
            'address.required' => 'Lokasi harus diisi!'
        ]);

        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->save();

        return redirect()->route('hospitals.index')->withSuccess('Rumah sakit berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hospital = Hospital::find($id);
        abort_if(!$hospital, 404, 'Rumah sakit tidak ditemukan!');

        $hospital->delete();

        return redirect()->route('hospitals.index')->withSuccess('Rumah sakit berhasil dihapus!');
    }
}
