<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index()
    {
        return view('pages.specialists.index', [
            'specialists' => Specialist::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Specialist::create($request->all());

        return redirect()->back()->withSuccess('Specialist successfully created');
    }

    public function update(Request $request, $id)
    {
        $specialist = Specialist::find($id);

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $specialist->update($request->all());

        return redirect()->back()->withSuccess('Specialist successfully updated');
    }

    public function destroy($id)
    {
        $specialist = Specialist::find($id);

        $specialist->delete();

        return redirect()->back()->withSuccess('Specialist successfully deleted');
    }
}