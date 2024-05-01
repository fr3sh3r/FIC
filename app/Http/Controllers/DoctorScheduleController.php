<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

class DoctorScheduleController extends Controller
{
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')
            ->when($request->input('doctor_id'), function ($query, $doctor_id) {
                return $query->where('doctor_id', $doctor_id);
            })
            ->orderBy('doctor_id', 'asc')
            ->paginate(10);

        return view('pages.doctor-schedules.index', compact('doctorSchedules'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor-schedules.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required',
            'time' => 'required',
            'status' => 'required',
            'note' => 'nullable|string',
        ]);

        DoctorSchedule::create($request->all());

        return redirect()->route('doctor-schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        return view('pages.doctor-schedules.edit', compact('doctorSchedule', 'doctors', 'daysOfWeek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required',
            'time' => 'required',
            'status' => 'required',
            'note' => 'nullable|string',
        ]);

        $doctorSchedule = DoctorSchedule::find($id);

        if (!$doctorSchedule) {
            return redirect()->route('doctor-schedules.index')->with('error', 'Doctor schedule not found.');
        }

        $doctorSchedule->update($request->all());









        return redirect()->route('doctor-schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);

        if (!$doctorSchedule) {
            return redirect()->route('doctor-schedules.index')->with('error', 'Doctor schedule not found.');
        }

        $doctorSchedule->delete();

        return redirect()->route('doctor-schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
