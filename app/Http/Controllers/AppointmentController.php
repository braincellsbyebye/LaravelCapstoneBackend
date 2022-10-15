<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $apt = Appointment::all();

        return response()->json([
            'status'=> 200,
            'appointment'=> $apt,
        ]);
    }

    public function store(Request $request)
    {
        $apt = new Appointment;
        $apt->name = $request->name;
        $apt->aptdate = $request->aptdate;
        $apt->apttime = $request->apttime;
        $apt->aptpurpose = $request->aptpurpose;

        $apt->save();

        $data = [
            'status' => true,
            'appointment' => $apt
        ];

        return response()->json($data, 201);
    }
}
