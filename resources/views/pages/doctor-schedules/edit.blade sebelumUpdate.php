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
                    <div class="card-body">
                        {{-- //<form action="{{ route('doctor-schedules.update', $doctorSchedule->id) }}" method="POST"
                            enctype="multipart/form-data"> --}}
                        <form action="{{ route('doctor-schedules.update', $doctorSchedule->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- ketemu nama doctornya, lalu kosongkan jadwalnya --}}
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

                            {{-- Loop through days of the week --}}
                            @foreach ($daysOfWeek as $day)
                                <div class="form-group">
                                    <label for="{{ strtolower($day) }}">Jadwal {{ $day }}</label>
                                    <input type="text" class="form-control" id="{{ strtolower($day) }}"
                                        name="{{ strtolower($day) }}" value="">
                                </div>
                            @endforeach

                            {{-- Note textarea --}}
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note"></textarea>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Additional scripts can be added here if needed -->
@endpush
