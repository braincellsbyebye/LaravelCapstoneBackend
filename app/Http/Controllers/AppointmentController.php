<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $apt = Appointment::where('aptcategory', 'Clinic')->get();

        return response()->json([
            'status'=> 200,
            'appointment'=> $apt,
        ]);
    }

    public function store(Request $request)
    {
        $apt = new Appointment();
        $apt->fname = $request->fname;
        $apt->lname = $request->lname;
        $apt->aptcategory = $request->aptcategory;
        $apt->aptdate = $request->aptdate;
        $apt->apttime = $request->apttime;
        $apt->aptpurpose = $request->aptpurpose;
        $apt->user_id = $request->user_id;

        $apt->save();

        $data = [
            'status' => true,
            'appointment' => $apt
        ];

        return $apt->toJson();
        //return response()->json($data, 201);
    }

    public function dental()
    {
        $apt = Appointment::where('aptcategory', 'Dental')->get();

        return response()->json([
            'status'=> 200,
            'appointment'=> $apt,
        ]);
    }
}
