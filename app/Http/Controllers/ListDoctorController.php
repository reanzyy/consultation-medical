<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListDoctorController extends Controller
{
    public function index()
    {
        return view('list.index');
    }
}
