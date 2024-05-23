<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PatientScheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get all patient schedule pagimnated
        //search patient schedule by patient_id
        // $patientSchedules = DB::table('patient_schedules')
        //     ->when($request->input('patient_id'), function ($query, $name) {
        //         return $query->where('patient_id', 'like', '%' . $name . '%');
        //     })
        //     ->orderBy('id', 'desc')
        //     ->get();
        // //->paginate(10);


        $patientSchedules = PatientSchedule::with('patient')
            ->when($request->input('nik'), function ($query, $nik) {
                return $query->whereHas('patient', function ($query) use ($nik) {
                    $query->where('nik', 'like', '%' . $nik . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $patientSchedules,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        // Count the number of entries with the same schedule_time
        //$queueNumber = PatientSchedule::whereDate('schedule_time', '=', $request->schedule_time)->count() + 1;
        $maxQueueNumber = PatientSchedule::whereDate('schedule_time', $request->schedule_time)->max('no_antrian');
        $queueNumber = (int)$maxQueueNumber + 1;

        // Use the $newQueueNumber for further processing



        //validate incoming request
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'schedule_time' => 'required',
            'complaint' => 'required',
            //'status' => 'required'
            //'no_antrian' => 'required',   //tidak perlu karena belum ada
            // 'payment_method' => 'required',
            //'total_price'  => 'required'
        ]);

        //Store patient schedule
        //cara 1:
        // $patientSchedule = DB::table('patient_schedules')->insert([
        //     'patient_id' => $request->patient_id,
        //     'doctor_id' => $request->doctor_id,
        //     'schedule_time' => $request->schedule_time,
        //     'complaint' => $request->complaint,
        //     'status' => 'waiting', //$request->status,
        //     'no_antrian' =>  $newQueueNumber,  //$request->no_antrian,
        //     // 'payment_method' => $request->payment_method,
        //     // 'total_price'  => $request->total_price,
        // ]);

        //cara 2:
        $patientSchedule = PatientSchedule::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_time' => $request->schedule_time,
            'complaint' => $request->complaint,
            'status' => 'waiting',  // kalau di awal penciptaan data pasti 'waiting' $request->status,
            // 'no_antrian' => $request->no_antrian,
            'no_antrian' =>  $queueNumber,
            // 'payment_method' => $request->payment_method,
            // 'total_price'  => $request->total_price,

            //pastikan ada      use App\Models\PatientSchedule;
        ]);

        return response([
            'data' => $patientSchedule,
            'message' => 'Patient schedule data saved successfully',
            'status' => 'OK'
        ], 201);
    }
}
