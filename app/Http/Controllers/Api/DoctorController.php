<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get all
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctor_name) {
               return $query->where ('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        //// Return JSON response with the doctors and a 200 status code
        //return response()->json($doctors,200);

        ////atau bisa dengan cara seperti ini
        return response([
            'data' => $doctors,
            'message' => 'Sukses',
            'status' => 'Berhasil'
        ], 200);

    }


}
