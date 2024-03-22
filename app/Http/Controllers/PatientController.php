<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get all patients paginated
        //search patients by nik
        // if ($request->nik)
        // {
        //     $patients = \App\Models\Patient::where('nik','like', '%'. $request->nik.'%')->paginate(10);
        // } else {
        //     $patients = \App\Models\Patient::paginate(10);
        // }

        // return view('pages.patients.index', compact('patients'));

        //atau pakai cara ini, dan sebelummya tambahkan use Illuminate\Support\Facades\DB; di baris atas
        $patients = DB::table('patients')
            ->when($request->input('nik'), function ($query, $name) {
                return $query->where('nik', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.patients.index', compact('patients'));

    }
}
