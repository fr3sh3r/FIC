<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    //
    public function index(Request $request)
    {
        //get all
        $schedules = DoctorSchedule::with('doctor')->when($request->input('name'), function ($query, $doctor_name) {
            return $query->whereHas('doctor', function ($query) use ($doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            });
        })
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'data'      => $schedules,
            'status'    => 'Success',
            'message'   => 'Doctor schedules are retrieved successfully'


        ], 200);
    }
}
