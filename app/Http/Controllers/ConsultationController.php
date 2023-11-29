<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(){
        $consultations = Consultation::get();
        
        return view('doctor.consultan.index', compact('consultations'));
    }
    public function sendMessage(){
        $phoneUser = User::all()->pluck('phone');
        $whatsappLink = "https://wa.me/{$phoneUser}";
        dd($whatsappLink);
        return view('doctor.consultan.index', compact('consultations'));
    }
}
