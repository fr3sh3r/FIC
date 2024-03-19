@extends('layouts.app')

@section('title', 'Edit Doctor Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctor</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor</h2>



                <div class="card">

                    {{-- <form action="{{ route('doctor-schedules.update', $doctor->id) }}" method="POST"> --}}
                    <form action="{{ route('doctor-schedules.update', $doctorSchedule->id) }}" method="POST"
                        enctype="multipart/form-data">


                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Doctor Schedules</h4>
                        </div>
                        <div class="card-body">

                            {{-- ketemu nama doctornya, lalu cari jadwalnya --}}
                            <div class="form-group" style="margin-top: 37px;">
                                <label>Doctor Name</label>
                                <input type="text" class="form-control @error('doctor_name') is-invalid @enderror"
                                    name="doctor_name" value="{{ $doctorSchedule->doctor->doctor_name ?? '' }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- $daysOfWeek = (['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']); --}}
                            <!-- Displaying doctor schedules for each day -->
                            @foreach ($daysOfWeek as $day)
                                @php
                                    $schedule = $doctorSchedule->where('day', $day)->first();
                                    $time = $schedule ? $schedule->time : '';
                                @endphp

                                <div class="form-group">
                                    <label>Jadwal {{ $day }}</label>
                                    <input type="text" class="form-control" name="{{ strtolower($day) }}"
                                        value="{{ $time }}">
                                </div>
                            @endforeach


                            {{-- <div class="form-group">
                                <label>Jadwal Senin</label>
                                <input type="text" class="form-control "name="senin">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Selasa</label>
                                <input type="text" class="form-control "name="selasa">
                            </div>

                            <div class="form-group">
                                <label>Jadwal Rabu</label>
                                <input type="text" class="form-control "name="rabu">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Kamis</label>
                                <input type="text" class="form-control "name="kamis">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Jumat</label>
                                <input type="text" class="form-control "name="jumat">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Sabtu</label>
                                <input type="text" class="form-control "name="sabtu">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Minggu</label>
                                <input type="text" class="form-control "name="minggu">
                            </div> --}}

                            {{-- //note textarea --}}
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control "name="note"></textarea>
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection





@push('scripts')
@endpush
